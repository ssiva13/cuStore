<?php

namespace app\commands;

use Psy\Output\ShellOutput;
use Yii;
use yii\base\Exception;
use yii\console\Controller;
use yii\helpers\Console;

/**
 * Manage the applicaton keys such as the cookieValidationKey
 */
class CookieKeyGeneratorController extends Controller
{
    public $defaultAction = 'generate';

    /**
     * Generate and set the cookie validation key - cookieValidationKey
     * @throws Exception
     */
    public function actionGenerate(){
        $key = $this->generateRandomKey();
        if (! $this->writeNewEnvironmentFileWith($key)) {
            return;
        }
        $this->info("Application key $key set successfully.");
    }
    
    /**
     * @throws \yii\base\Exception
     */
    protected function generateRandomKey(): string
    {
        return Yii::$app->getSecurity()->generateRandomString(32);
    }
    
    /**
     * @param string $key
     *
     * @return bool
     */
    protected function writeNewEnvironmentFileWith(string $key): bool
    {
        $currentKey = env('APP_KEY');
        if (strlen($currentKey) !== 0 && (! $this->confirmToProceed())) {
            return false;
        }
        $replacement = preg_replace(
            $this->keyReplacementPattern(),
            "APP_KEY=$key\n",
            file_get_contents(Yii::$app->basePath.'/.env')
        );
        return file_put_contents(Yii::$app->basePath.'/.env', $replacement);
    }
    
    /**
     * @return string
     */
    private function keyReplacementPattern(): string
    {
        $keyPattern = "/\bAPP_KEY\b/i";
        $currentKeyArray = array_values(preg_grep($keyPattern, file(Yii::$app->basePath.'/.env')));
        $escaped = preg_quote($currentKeyArray[0], '/');
        
        return "/^{$escaped}/m";
    }
    
    /**
     * @return bool
     */
    private function confirmToProceed(): bool
    {
        return Console::confirm("Generate Another Key?");
    }
    
    /**
     * Write a string as information output.
     *
     * @param string $string
     *
     * @return void
     */
    public function info(string $string)
    {
        $this->line($string, 'info');
    }
    
    /**
     * Write a string as standard output.
     *
     * @param string $string
     * @param string|null $style
     *
     * @return void
     */
    public function line(string $string, string $style = null)
    {
        $styled = $style ? "<$style>$string</$style>" : $string;
    
        (new ShellOutput)->writeln($styled);
    }
    
}
