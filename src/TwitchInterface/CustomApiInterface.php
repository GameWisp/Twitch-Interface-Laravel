<?php
namespace TwitchInterface;

use Config;
use Log;

class CustomApiInterface
{
  
  /**
   * Retrieves the value of a passed parameter in a URL string, positionally insensitive
   *
   * @param $url - [string] URL string provided
   * @param $param - [string] The string parameter name to look for
   * @param $maxMatchLength - [int] The maximum match length for the value, defaults to 40
   * @param $matchSymbols - [bool] Sets the search to look for symbols in the value
   *
   * @return $value - [string] The string value of that parameter searched for
   */
  protected function getURLParamValue($url, $param, $maxMatchLength = 40, $matchSymbols = false) {
    if ($matchSymbols) {
      $match = '[\w._@#$%\^\*\(\)!+\\|-]';
    } 
    else {
      $match = '[\w]';
    }
    
    //init and dump the chars into the regex
    $param_regex = '';
    $chars = str_split($param);
    
    // Build a char match for the param, case insensitive
    foreach ($chars as $char) {
      $param_regex.= '[' . strtoupper($char) . strtolower($char) . ']';
    }
    
    $value_arr = array();
    preg_match('(' . $param_regex . '=' . $match . '{1,' . $maxMatchLength . '})', $url, $value_arr);
    
    // Dump to a string
    $value = $value_arr[0];
    
    // Strip out the identifier
    $value = preg_replace('([a-z]{1,40}=)', '', $value);
    
    // Clean memory
    unset($url, $param, $maxMatchLength, $matchSymbols, $match, $param_regex, $chars, $char, $value_arr);
    
    return $value;
  }
  
  /**
   * Grabs an array of all URL parameters and values
   *
   * @param $url - [string] URL string provided
   * @param $maxMatchLength - [int] The maximum match length for all matches, defaults to 40
   * @param $matchSymbols - [bool] Sets the search to look for symbols in the value
   *
   * @return $parameters - [array] A keyed array of all values returned, key is param
   */
  protected function getURLParams($url, $maxMatchLength = 40, $matchSymbols = false) {
    if ($matchSymbols) {
      $match = '[\w._@#$%\^\*\(\)!+\\|-]';
    } 
    else {
      $match = '[\w]';
    }
    
    $matches = array();
    $parameters = array();
    preg_match('(([\w]{1,' . $maxMatchLength . '}=' . $match . '{1,' . $maxMatchLength . '}[&]{0,1}){1,' . $maxMatchLength . '})', $url, $matches);
    
    $split = split('&', $matches[0]);
    
    foreach ($split as $row) {
      $splitRow = split('=', $row);
      $parameters[$splitRow[0]] = $splitRow[1];
    }
    
    unset($url, $maxMatchLength, $matchSymbols, $match, $matches, $split, $row, $splitRow);
    
    return $parameters;
  }
}
