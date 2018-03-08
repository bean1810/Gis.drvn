<?php

/**
 * Created by PhpStorm.
 * User: Buminta
 * Date: 2/24/14
 * Time: 10:54 PM
 */
class ModelConfig
{
  public static $config = array(
    'autoCreate' => true,
    'collate' => 'utf8_unicode_ci',
    'tableLog' => 'auth_user',
    'database' => array(
      'auth_user' => array(
        'first_name' => array(
          'type' => 'text',
          'label' => 'First name'
        ),
        'last_name' => array(
          'type' => 'text',
          'label' => 'Last name'
        ),
        'email' => array(
          'type' => 'text',
          'label' => 'Email'
        ),
        'username' => array(
          'type' => 'text',
          'label' => 'Username',
          'select' => true
        ),
        'password' => array(
          'type' => 'text',
          'label' => 'Password',
        ),
        'birthday' => array(
          'type' => 'date',
          'label' => 'Birthday'
        ),
        'address' => array(
          'type' => 'text',
          'label' => 'Address'
        ),
        #######################
        ### Config Table
        'hashCode' => array(
          'password' => 'username'
        )
      ),
      'auth_group' => array(
        'name' => array(
          'type' => 'text',
          'label' => 'Group name',
          'select' => true
        ),
        'code' => array(
          'type' => 'text',
          'label' => 'Code'
        ),
        'description' => array(
          'type' => 'string',
          'label' => 'Description'
        )
      ),
      'auth_membership' => array(
        'user_id' => array(
          'type' => 'relation',
          'table' => 'auth_user',
          'label' => 'User'
        ),
        'group_id' => array(
          'type' => 'relation',
          'table' => 'auth_group',
          'label' => 'Group'
        )
      ),
      ########################
      'users_logs' => array(
        'from_url' => array(
          'type' => 'text',
          'label' => 'From URL'
        ),
        'link' => array(
          'type' => 'text',
          'label' => 'Link'
        ),
        'time' => array(
          'type' => 'datetime',
          'label' => 'Time'
        ),
        'address' => array(
          'type' => 'text',
          'label' => 'IP Address'
        ),
        'platform' => array(
          'type' => 'text',
          'label' => 'Platform'
        ),
        'browser' => array(
          'type' => 'text',
          'label' => 'Browser'
        )
      ),
      'menu_categories' => array(
        'name' => array(
          'type' => 'text',
          'label' => 'Category Name',
          'select' => true
        ),
        'description' => array(
          'type' => 'string',
          'label' => 'Description'
        )
      ),
      'menu_action' => array(
        'name' => array(
          'type' => 'text',
          'label' => 'Action Name'
        ),
        'category_id' => array(
          'type' => 'relation',
          'table' => 'menu_categories',
          'label' => 'Category'
        ),
        'controller' => array(
          'type' => 'text',
          'label' => 'Controller'
        ),
        'action' => array(
          'type' => 'text',
          'label' => 'Action'
        ),
        'description' => array(
          'type' => 'string',
          'label' => 'Description'
        )
      ),
      ##### End block auth

      ######## Begin block configs model
        'config' => array(
            'code' => array(
                'type' => 'text',
                'label' => 'CODE'
            ),
            'description' => array(
                'type' => 'string',
                'label' => 'Description'
            ),
        ),
      ######## End Block configs
    )
  );
}