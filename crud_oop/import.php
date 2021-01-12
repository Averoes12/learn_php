<?php 
include 'connect.php';
require_once('vendor/autoload.php');
use Faker\Factory;
$faker = Factory::create('id_ID');

$db = new database();
for($i=1;$i<=50;$i++){
	$nama = $faker->name;
	$alamat = $faker->address;
    $umur= $faker->numberBetween(25,40);
    $db->input_data(NULL, $nama, $alamat, "Pegawai", $umur);
}
header("location:index.php");
?>