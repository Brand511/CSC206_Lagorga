<?php

/**
 * Created by PhpStorm.
 * User: Brandon
 * Date: 4/2/2017
 * Time: 12:07 AM
 */
class userList
{
    public static function users($data)
    {
        foreach ( $data as $user ) {
            Self::user($user);
        }
    }



    public static function makeTable()
    {
        echo <<<supertable
	<form id="userListForm" action='updateUser.php' method="GET">
	<table>	
		
		<th>Email</th>
		<th>FirsttName</th>
		<th>LastName</th>
		<th colspan= "3">Options</th>
supertable;
    }


    public static function user($data)
    {


        $id = $data['id'];
        $email = $data['email'];
        $firstName = $data['firstName'];
        $lastName = $data['lastName'];



        echo <<<user
			<tr>
			                 
            <td class ="longWords">$email</td>
			<td>$firstName</td>  
			<td>$lastName</td>
                    <td><a class="editButton" href="/updateUser.php?id=$id">Edit</a></td>
					<td><a class="editButton" href="/ViewUser.php?id=$id">View</a></td>
					 <td><a class="deleteButton" href="/deleteUser.php?id=$id">Delete</a></td>
					 
                </div>
            </div>
			</tr>
user;





    }
    public static function endTable()
    {
        echo <<<superTable
			</table>
			</form>
superTable;
    }

}