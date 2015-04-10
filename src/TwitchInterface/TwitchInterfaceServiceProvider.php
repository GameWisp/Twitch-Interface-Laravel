<?php

namespace Gamewisp\TwitchInterface;

use Illuminate\Support\ServiceProvider;

class TwitchInterfaceServiceProvider extends ServiceProvider {

  /**
   * Indicates if loading of the provider is deferred.
   *
   * @var bool
   */
  protected $defer = false;

  /**
   * Bootstrap the application events.
   *
   * @return void
   */
  public function boot() {
    $this->package('twitch-interface-laravel');
  }

  /**
   * Register the service provider.
   *
   * @return void
   */
  public function register() {
    // Register 'twitchinterface'
    $this->app['twitchinterface'] = $this->app->share(function($app) {
      // create twitchinterface instance
      $twitchInterface = new TwitchInterface();
      // return twitchinterface instance
      return $twitchInterface;
    });
  }

  /**
   * Get the services provided by the provider.
   *
   * @return array
   */
  public function provides() {
    return array();
  }

}
