<?php
namespace App\Models;

class Permission extends \Spatie\Permission\Models\Permission
{
  public static function defaultPermissions()
  {
    return [

      'view_adverts',
      'create_adverts',
      'update_adverts',
      'delete_adverts',

      'view_albums',
      'create_albums',
      'update_albums',
      'delete_albums',

      'view_newsletters',
      'create_newsletters',
      'update_newsletters',
      'delete_newsletters',

      'view_users',
      'create_users',
      'update_users',
      'delete_users',

      'view_roles',
      'create_roles',
      'update_roles',
      'delete_roles',

      'view_permissions',
      'create_permissions',
      'update_permissions',
      'delete_permissions',

      'view_posts',
      'create_posts',
      'update_posts',
      'delete_posts',

      'view_companies',
      'create_companies',
      'update_companies',
      'delete_companies',

      'view_groups',
      'create_groups',
      'update_groups',
      'delete_groups',

      'view_products',
      'create_products',
      'update_products',
      'delete_products',

      'view_events',
      'create_events',
      'update_events',
      'delete_events',

      'company_management',
      'group_management',
      'event_management',
      'product_management',
      'order_management',
    ];
  }
}
