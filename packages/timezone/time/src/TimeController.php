<?php 
namespace Timezone\Time;
use App\Http\Controllers\Controller;

class TimeController extends Controller{
	public function index($timezone){

		return $timezone;
	
	}
}

?>