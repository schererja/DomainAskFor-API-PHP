<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Iodev\Whois\Factory;


class WhoIsController extends Controller
{
  public function show($id)
  {
    $whois = Factory::get()->createWhois();
    return array("DomainName" => $id, "IsAvailable" => $whois->isDomainAvailable($id));
  }
}
