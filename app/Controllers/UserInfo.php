<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\Shield\Models\UserModel;
use CodeIgniter\Shield\Models\UserIdentityModel;
use CodeIgniter\Shield\Models\GroupModel;

class UserInfo extends Controller
{
    public function show()
    {
        $provider = auth()->getProvider();

        $users = $provider
            ->withIdentities()
            ->withGroups()
            ->withPermissions()
            ->findAll();

        echo '<div style="font-family: Arial, sans-serif; padding: 20px;">';
        echo '<h3>User List</h3>';
        echo '<table border="1" cellspacing="0" cellpadding="8" style="border-collapse: collapse; width: 100%;">';
        echo '<thead style="background: #f2f2f2;">';
        echo '<tr>
            <th>ID</th>
            <th>Username</th>
            <th>Identities</th>
            <th>Groups</th>
            <th>Permissions</th>
            <th>Created</th>
            <th>Last Active</th>
          </tr>';
        echo '</thead><tbody>';

        foreach ($users as $user) {
            // Format identities
            $identities = '';
            foreach ($user->identities as $identity) {
                $identities .= "<div><strong>{$identity->type}</strong>: {$identity->secret}</div>";
            }

            // Format groups
            $groups = '';
            foreach ($user->groups as $group) {
                $groups .= "<span style='display:inline-block; background:#d9edf7; color:#31708f; 
                        padding:3px 8px; border-radius:5px; margin:2px;'>{$group}</span>";
            }

            // Format permissions
            $permissions = '';
            foreach ($user->permissions as $perm) {
                $permissions .= "<span style='display:inline-block; background:#dff0d8; color:#3c763d; 
                            padding:3px 8px; border-radius:5px; margin:2px;'>{$perm}</span>";
            }

            echo "<tr>
                <td>{$user->id}</td>
                <td>{$user->username}</td>
                <td>{$identities}</td>
                <td>{$groups}</td>
                <td>{$permissions}</td>
                <td>{$user->created_at}</td>
                <td>{$user->last_active}</td>
              </tr>";
        }

        echo '</tbody></table></div>';
    }
}
