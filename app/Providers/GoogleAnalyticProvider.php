<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
class GoogleAnalyticProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register()
    {
       
     
        
        // Check if the database connection is established
        try {
            DB::connection()->getPdo();
        } catch (\Exception $e) {
            die("Could not connect to the database. Please check your configuration.");
        }
        
        // Check if the necessary tables exist
        $tablesExist = Schema::hasTable('google_analytics') &&
                       Schema::hasTable('google_recaptchas') &&
                       Schema::hasTable('facebook_meta_pixel_ids');
        
        if (!$tablesExist) {
            die("One or more required tables are missing.");
        }
        
        // Run the main script if tables exist
        $dataFromDatabase = DB::table('google_analytics')->latest()->first();
        $google_recaptchas = DB::table('google_recaptchas')->latest()->first();
        $facebook_meta_pixel_id = DB::table('facebook_meta_pixel_ids')->latest()->first();
        
        if ($google_recaptchas) {
            $envPath = base_path('.env');
            $envContent = file_get_contents($envPath);
        
            $importedFlag = env('RECAPTCHA_IMPORTED_FLAG', false);
        
            if (!$importedFlag) {
                $CAPTCHA_SITE_KEY = config('services.key.CAPTCHA_SITE_KEY');
                $CAPTCHA_SECRET_KEY = config('services.key.CAPTCHA_SECRET_KEY');
        
                $newCAPTCHA_SITE_KEY = $google_recaptchas->recaptcha_site_key;
                $newCAPTCHA_SECRET_KEY = $google_recaptchas->recaptcha_secret_key;
        
                if ($newCAPTCHA_SITE_KEY !== null && $newCAPTCHA_SITE_KEY !== $CAPTCHA_SITE_KEY) {
                    $envContent = str_replace(
                        'CAPTCHA_SITE_KEY=' . $CAPTCHA_SITE_KEY,
                        'CAPTCHA_SITE_KEY=' . $newCAPTCHA_SITE_KEY,
                        $envContent
                    );
                }
        
                if ($newCAPTCHA_SECRET_KEY !== null && $newCAPTCHA_SECRET_KEY !== $CAPTCHA_SECRET_KEY) {
                    $envContent = str_replace(
                        'CAPTCHA_SECRET_KEY=' . $CAPTCHA_SECRET_KEY,
                        'CAPTCHA_SECRET_KEY=' . $newCAPTCHA_SECRET_KEY,
                        $envContent
                    );
                }
        
                file_put_contents($envPath, $envContent);
        
                // Set the flag to indicate that the import has been done
                file_put_contents($envPath, "\nRECAPTCHA_IMPORTED_FLAG=true", FILE_APPEND | LOCK_EX);
            }
        }
        
        if ($dataFromDatabase) {
            $envPath = base_path('.env');
            $analyticsPropertyId = config('services.ANALYTICS_PROPERTY_ID');
            $newAnalyticsPropertyId = $dataFromDatabase->google_analytics_id;
            
            $importedFlag = env('ANALYTICS_IMPORTED_FLAG', false);
            
            if (!$importedFlag && $newAnalyticsPropertyId !== null && $newAnalyticsPropertyId !== $analyticsPropertyId) {
                $envContent = file_get_contents($envPath);
                $newEnvContent = str_replace(
                    'ANALYTICS_PROPERTY_ID=' . $analyticsPropertyId,
                    'ANALYTICS_PROPERTY_ID=' . $newAnalyticsPropertyId,
                    $envContent
                );
                file_put_contents($envPath, $newEnvContent);
            
                // Set the flag to indicate that the import has been done
                file_put_contents($envPath, "\nANALYTICS_IMPORTED_FLAG=true", FILE_APPEND | LOCK_EX);
            }
        
            
            config()->set('services.ANALYTICS_PROPERTY_ID', $dataFromDatabase->google_analytics_id);
            // Update the values in the JSON object
            $jsonArray['type'] = $dataFromDatabase->type;
            $jsonArray['project_id'] = $dataFromDatabase->project_id;
            $jsonArray['private_key_id'] = $dataFromDatabase->private_key_id;
            $jsonArray['private_key'] = str_replace("\\n", "\n", $dataFromDatabase->private_key);
            $jsonArray['client_email'] = $dataFromDatabase->client_email;
            $jsonArray['client_id'] = $dataFromDatabase->client_id;
            $jsonArray['auth_uri'] = $dataFromDatabase->auth_uri;
            $jsonArray['token_uri'] = $dataFromDatabase->token_uri;
            $jsonArray['auth_provider_x509_cert_url'] = $dataFromDatabase->auth_provider_x509_cert_url;
            $jsonArray['client_x509_cert_url'] = $dataFromDatabase->client_x509_cert_url;
            $jsonArray['universe_domain'] = $dataFromDatabase->universe_domain;
        
            // Convert the updated PHP array back to JSON
            $updatedJsonData = json_encode($jsonArray, JSON_UNESCAPED_SLASHES);
            
            // Write the updated JSON data back to the file
            Storage::disk('local')->put('analytics/service-account-credentials.json', $updatedJsonData);
        }
        
        if ($facebook_meta_pixel_id) {
            $envPath = base_path('.env');
            $envContent = file_get_contents($envPath);
        
            $importedFlag = env('META_PIXEL_ID', false);
        
            if (!$importedFlag) {
                $META_PIXEL_ID = config('services.META_PIXEL_ID');
                $new_META_PIXEL_ID = $facebook_meta_pixel_id->meta_pixel_id;
        
                if ($new_META_PIXEL_ID !== null && $new_META_PIXEL_ID !== $META_PIXEL_ID) {
                    $envContent = str_replace(
                        'META_PIXEL_ID=' . $META_PIXEL_ID,
                        'META_PIXEL_ID=' . $new_META_PIXEL_ID,
                        $envContent
                    );
                }
        
                file_put_contents($envPath, $envContent);
        
                // Set the flag to indicate that the import has been done
                file_put_contents($envPath, "\nMETA_PIXEL_ID_IMPORTED_FLAG=true", FILE_APPEND | LOCK_EX);
            }
        }
        
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
