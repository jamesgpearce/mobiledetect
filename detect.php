<?php

/*

This is a simple implementation of a mobile device detection algorithm,
originating from the detection used in the dotMobi WordPress Mobile Pack:

    http://wordpress.org/extend/plugins/wordpress-mobile-pack/

The WordPress Mobile Pack is Licensed under the Apache License, Version 2.0
(the "License"); you may not use this file except in compliance with the
License.

You may obtain a copy of the License at

    http://www.apache.org/licenses/LICENSE-2.0

Unless required by applicable law or agreed to in writing, software distributed
under the License is distributed on an "AS IS" BASIS, WITHOUT WARRANTIES OR
CONDITIONS OF ANY KIND, either express or implied. See the License for the
specific language governing permissions and limitations under the License.

*/

function mobile_detection() {
  if (isset($_SERVER['HTTP_X_WAP_PROFILE']) ||
      isset($_SERVER['HTTP_PROFILE'])) {
    return true;
  }
  $user_agent = strtolower($_SERVER['HTTP_USER_AGENT']);
  if (in_array(substr($user_agent, 0, 4), mobile_detection_ua_prefixes())) {
    return true;
  }
  $accept = strtolower($_SERVER['HTTP_ACCEPT']);
  if (strpos($accept, 'wap') !== false) {
    return true;
  }
  if (preg_match("/(" . mobile_detection_ua_contains() . ")/i", $user_agent)) {
    return true;
  }
  if (isset($_SERVER['ALL_HTTP']) &&
      strpos(strtolower($_SERVER['ALL_HTTP']), 'operamini') !== false) {
    return true;
  }
  return false;
}

function mobile_detection_ua_prefixes() {
  return array(
    'w3c ',
    'w3c-',
    'acs-',
    'alav',
    'alca',
    'amoi',
    'audi',
    'avan',
    'benq',
    'bird',
    'blac',
    'blaz',
    'brew',
    'cell',
    'cldc',
    'cmd-',
    'dang',
    'doco',
    'eric',
    'hipt',
    'htc_',
    'inno',
    'ipaq',
    'ipod',
    'jigs',
    'kddi',
    'keji',
    'leno',
    'lg-c',
    'lg-d',
    'lg-g',
    'lge-',
    'lg/u',
    'maui',
    'maxo',
    'midp',
    'mits',
    'mmef',
    'mobi',
    'mot-',
    'moto',
    'mwbp',
    'nec-',
    'newt',
    'noki',
    'palm',
    'pana',
    'pant',
    'phil',
    'play',
    'port',
    'prox',
    'qwap',
    'sage',
    'sams',
    'sany',
    'sch-',
    'sec-',
    'send',
    'seri',
    'sgh-',
    'shar',
    'sie-',
    'siem',
    'smal',
    'smar',
    'sony',
    'sph-',
    'symb',
    't-mo',
    'teli',
    'tim-',
    'tosh',
    'tsm-',
    'upg1',
    'upsi',
    'vk-v',
    'voda',
    'wap-',
    'wapa',
    'wapi',
    'wapp',
    'wapr',
    'webc',
    'winw',
    'winw',
    'xda ',
    'xda-',
  );
}

function mobile_detection_ua_contains() {
  return implode("|", array(
    'android',
    'blackberry',
    'hiptop',
    'ipod',
    'lge vx',
    'midp',
    'maemo',
    'mmp',
    'netfront',
    'nintendo DS',
    'novarra',
    'openweb',
    'opera mobi',
    'opera mini',
    'palm',
    'psp',
    'phone',
    'smartphone',
    'symbian',
    'up.browser',
    'up.link',
    'wap',
    'windows ce',
  ));
}

?>