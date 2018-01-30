<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $sadmin1 = new User();
      $sadmin1->fullname = 'SuperAdmin1';
      $sadmin1->username = 'sadmin1';
      $sadmin1->ktp_id = rand();
      $sadmin1->email = 'superadmin1@babastudio.com';
      $sadmin1->birth_date = '2000-04-07';
      $sadmin1->password = bcrypt('superadmin');
      $sadmin1->phone = '081225138574';
      $sadmin1->mobile = '081225138575';
      $sadmin1->mobile2 = '081225138576';
      $sadmin1->pin_bb = str_random(8);
      $sadmin1->sex = 'L';
      $sadmin1->zipcode = rand();
      $sadmin1->fb = 'https://facebook.com/';
      $sadmin1->tw = 'https://twitter.com/';
      $sadmin1->website = 'https://www.babastudio.com/';
      $sadmin1->status = 'status';
      $sadmin1->hobby = 'Ngoding';
      $sadmin1->reason = 'Suka';
      $sadmin1->role_id = 1;
      $sadmin1->save();

      $sadmin2 = new User();
      $sadmin2->fullname = 'User2';
      $sadmin2->username = 'sadmin2';
      $sadmin2->ktp_id = rand();
      $sadmin2->email = 'user2@babastudio.com';
      $sadmin2->birth_date = '2000-04-07';
      $sadmin2->password = bcrypt('superadmin');
      $sadmin2->phone = '081225138574';
      $sadmin2->mobile = '081225138575';
      $sadmin2->mobile2 = '081225138576';
      $sadmin2->pin_bb = str_random(8);
      $sadmin2->sex = 'L';
      $sadmin2->zipcode = rand();
      $sadmin2->fb = 'https://facebook.com/';
      $sadmin2->tw = 'https://twitter.com/';
      $sadmin2->website = 'https://www.babastudio.com/';
      $sadmin2->status = 'status';
      $sadmin2->hobby = 'Ngoding';
      $sadmin2->reason = 'Suka';
      $sadmin2->role_id = 2;
      $sadmin2->save();

      $sadmin3 = new User();
      $sadmin3->fullname = 'User3';
      $sadmin3->username = 'sadmin3';
      $sadmin3->ktp_id = rand();
      $sadmin3->email = 'user3@babastudio.com';
      $sadmin3->birth_date = '2000-04-07';
      $sadmin3->password = bcrypt('superadmin');
      $sadmin3->phone = '081225138574';
      $sadmin3->mobile = '081225138575';
      $sadmin3->mobile2 = '081225138576';
      $sadmin3->pin_bb = str_random(8);
      $sadmin3->sex = 'L';
      $sadmin3->zipcode = rand();
      $sadmin3->fb = 'https://facebook.com/';
      $sadmin3->tw = 'https://twitter.com/';
      $sadmin3->website = 'https://www.babastudio.com/';
      $sadmin3->status = 'status';
      $sadmin3->hobby = 'Ngoding';
      $sadmin3->reason = 'Suka';
      $sadmin3->role_id = 3;
      $sadmin3->save();

      $sadmin4 = new User();
      $sadmin4->fullname = 'User4';
      $sadmin4->username = 'sadmin4';
      $sadmin4->ktp_id = rand();
      $sadmin4->email = 'user4@babastudio.com';
      $sadmin4->birth_date = '2000-04-07';
      $sadmin4->password = bcrypt('superadmin');
      $sadmin4->phone = '081225138574';
      $sadmin4->mobile = '081225138575';
      $sadmin4->mobile2 = '081225138576';
      $sadmin4->pin_bb = str_random(8);
      $sadmin4->sex = 'L';
      $sadmin4->zipcode = rand();
      $sadmin4->fb = 'https://facebook.com/';
      $sadmin4->tw = 'https://twitter.com/';
      $sadmin4->website = 'https://www.babastudio.com/';
      $sadmin4->status = 'status';
      $sadmin4->hobby = 'Ngoding';
      $sadmin4->reason = 'Suka';
      $sadmin4->role_id = 4;
      $sadmin4->save();

      $sadmin5 = new User();
      $sadmin5->fullname = 'User5';
      $sadmin5->username = 'sadmin5';
      $sadmin5->ktp_id = rand();
      $sadmin5->email = 'user5@babastudio.com';
      $sadmin5->birth_date = '2000-04-07';
      $sadmin5->password = bcrypt('superadmin');
      $sadmin5->phone = '081225138574';
      $sadmin5->mobile = '081225138575';
      $sadmin5->mobile2 = '081225138576';
      $sadmin5->pin_bb = str_random(8);
      $sadmin5->sex = 'L';
      $sadmin5->zipcode = rand();
      $sadmin5->fb = 'https://facebook.com/';
      $sadmin5->tw = 'https://twitter.com/';
      $sadmin5->website = 'https://www.babastudio.com/';
      $sadmin5->status = 'status';
      $sadmin5->hobby = 'Ngoding';
      $sadmin5->reason = 'Suka';
      $sadmin5->role_id = 5;
      $sadmin5->save();

    }
}
