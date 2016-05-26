<?php

namespace Members\View\Helper;

use Members\Tool\Identifier;

class MembersAuthHelper extends \Zend_View_Helper_Abstract {

    /**
     * @var \Zend_Auth
     */
    private static $_auth;

    public function __construct()
    {
        $identifier = new Identifier();
        self::$_auth = $identifier->getIdentity();
    }

    public function membersAuthHelper()
    {
        return $this;
    }

    public function isLoggedIn()
    {
        if( !is_null(self::$_auth))
        {
            return TRUE;
        }

        return FALSE;
    }

    public function getSetting($value, $localizeValue = FALSE)
    {
        if( $localizeValue === TRUE)
        {
            return \Members\Model\Configuration::getLocalizedPath($value);
        }
        return \Members\Model\Configuration::get($value);
    }

    public function getUser()
    {
        return self::$_auth;
    }
}