<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class TestController extends Controller{

    public function __construct(){

        //Laravel-Middleware
        
        /**
         * Laravel-Middleware-1:
         *
         * @param $this->middleware('auth');
         * 
         * Laravel-Middleware-2:
         *
         * @param $this->middleware('log')->only('index');
         *
         * Laravel-Middleware-3:
         *
         * @param $this->middleware('subscribed')->except('store');
         *
         */
    }

    public function index(test $request){

    	//Laravel-FormRequestValidation

    		/**
    		* Creating Form Request Validation
    		* ----------------------------------------------
    		*
    		* Use the make:request Artisan CLI command:
    		*
    		* @param 	php artisan make:request StoreBlogPost			
    		* @return 	Create a form request class, in the app/Http/Requests directory.
    		*
    		* Created when you run the make:request command. Let’s add a few validation rules to the rules method ( return [ @param array ] ): 
    		*
    		* @param 	'title' => 'required|max:255'					
    		* @return 	present in the input data and not empty | less than or equal to a maximum value 255.
    		* 
    		* Customize the error messages used by the form request by overriding the messages method ( return [ @param array ] ):
    		*
    		* @param 	'title.required' => 'A title is required'		
    		* @return 	:message = 'A title is required'
    		*
    		* Meaning you do not need to clutter your controller with any validation logic:
    		*
    		* @param 	function (StoreBlogPost $request)	
    		* @return 	The incoming request is valid...
    		* 
    		* The form request class also contains an authorize method
    		*
    		* @param 	return true;									
    		* @return 	controller method will execute.
    		*/

    		/**
    		* Input Request Validation Snippet Sublime
    		* @param Validation-Uniq 			@return 'name' => 'required|unique:products',
    		* @param Validation-Required 		@return 'model' => 'required',
    		* @param Validation-Photo			@return 'photo' => 'mimes:jpeg,png|max:10240',
    		*
    		*/


	        /**
	        * Available Validation Rules
	        * ----------------------------------------------
	        *
	        * A :
	        *
	        *	@param accepted 								@return yes, on, 1, or true.
	        *	@param active_ur 								@return valid URL according to the checkdnsrr PHP function.
	        *	@param after:date 								@return value after a given date. The dates will be passed into the strtotime PHP function: 'start_date' => 'required|date|after:tomorrow'
	        *	@param array									@return PHP array.
	        *	@param alpha 									@return alphabetic characters.
			*	@param alpha_dash 								@return alpha-numeric characters, as well as dashes and underscores.
			*	@param alpha_num 								@return alpha-numeric characters.
	        *
	        * B :
	        *
	        *	@param before:date								@return value preceding the given date. The dates will be passed into the PHP strtotime function.
	        *	@param between:min,max							@return have a size between the given min and max. Strings, numerics, and files are evaluated in the same fashion as the size rule.
	        *	@param boolean									@return Accepted input are true, false, 1, 0, "1", and "0".
	        *
	        * C :
	        *
	        *	@param confirmed								@return validation is 'password', a matching 'password_confirmation' field must be present in the input.
	        *
	        * D :
	        *
	        *	@param date										@return valid date. according to the strtotime PHP function.
	        *	@param date_format:format						@return match the given format.
	        *	@param different:field	 						@return have a different value than field.
	        *	@param digits:value								@return numeric and must have an exact length of value.
			*	@param digits_between:min,max					@return have a length between the given min and max.
			*	@param dimensions	 							@return image meeting the dimension constraints as specified by the rule’s parameters: 'avatar' => 'dimensions:min_width=100,min_height=200'.
			*	...														Available constraints are: min_width, max_width, min_height, max_height, width, height, ratio.
			*	...														A Ratio statement like 3/2 or a float like 1.5: 'avatar' => 'dimensions:ratio=3/2'
	        *	@param distinct									@return not have any duplicate values. 'foo.*.id' => 'distinct'
	        *
	        * E :
	        *
	        *	@param email									@return formatted as an e-mail address
	        *	@param exists:table,column						@return exist on a given database table.
	        *
	        * F :
	        *
	        *	@param file										@return a successfully uploaded file.
	        *	@param filled									@return not be empty when it is present.
	        *
	        * I :
	        *
	        *	@param image									@return image (jpeg, png, bmp, gif, or svg)
	        *	@param in:foo,bar,…								@return included in the given list of values.
	        *	@param in_array:anotherfield					@return exist in anotherfield‘s values.
	        *	@param integer									@return integer.
			*	@param ip										@return IP address.
	        *
	        * J :
	        *
	        *	@param json										@return a valid JSON string.
	        *
	        * M :
	        *
	        *	@param max:value								@return less than or equal to a maximum value. Strings, numerics, and files are evaluated in the same fashion as the size rule.
	        *	@param mimetypes:text/plain,…					@return The file under validation must match one of the given MIME types: 'video' => 'mimetypes:video/avi,video/mpeg,video/quicktime'
	        *	@param mimes:foo,bar,…	 						@return MIME type corresponding to one of the listed extensions. 'photo' => 'mimes:jpeg,bmp,png'
	        *															http://svn.apache.org/repos/asf/httpd/httpd/trunk/docs/conf/mime.types
	        *	@param min:value								@return minimum value. Strings, numerics, and files are evaluated in the same fashion as the size rule.
	        *
	        * N :
	        *
	        *	@param nullable									@return null values.
	        *	@param not_in:foo,bar,…							@return not be included in the given list of values.
	        *	@param numeric	 								@return numeric.
	        *
	        * P :
	        *
	        *	@param present									@return present in the input data but can be empty.
	        *
	        * R :
	        *
	        *	@param regex:pattern							@return the given regular expression. rules in an array instead
	        *	@param required									@return present in the input data and not empty.
	        *	@param required_if:anotherfield,value,…	 		@return present and not empty if the anotherfield field is equal to any value. 
			*	@param required_with:foo,bar,…					@return present and not empty unless the anotherfield field is equal to any value.
			*	@param required_with_all:foo,bar,…	 			@return present and not empty only if any of the other specified fields are present.
	        *	@param required_without:foo,bar,…				@return present and not empty only if all of the other specified fields are present.
	        *	@param required_without_all:foo,bar,…			@return present and not empty only when any of the other specified fields are not present.
	        *
	        * S :
	        *
	        *	@param same:field								@return the field under validation.
	        *	@param size:value								@return have a size matching the given value.
	        *	@param string	 								@return string. If you would like to allow the field to also be null, you should assign the nullable rule to the field.
	        *
	        * T :
	        *
	        *	@param timezone									@return valid timezone identifier according to the timezone_identifiers_list PHP function.
	        *
	        * U :
	        *
	        *	@param unique:table,column,except,idColumn		@return unique in a given database table. If the column option is not specified, the field name will be used.
	        *	@param url										@return valid URL.
	        *
	        */

    	//Laravel-Requests Data

			/**
	         * You may also retrieve all of the input data as an array using the all method:
	         * 
	         * @param 	$request->all();
	         * @return 	input data as an array using the all method
	         *
	         * Access all of the user input from your Illuminate\Http\Request the input method may be used to retrieve user input:
	         * 
	         * @param 	$request->input('name');
	         * @return 	input method may be used to retrieve user inpu
	         *
	         * This value will be returned if the requested input value is not present on the request:
	         * 
	         * @param $request->input('name', 'Sally');
	         * @return You may pass a default value as the second argument to the input method.
	         *
	         * use “dot” notation to access the arrays:
	         * 
	         * @param $request->input('products.0.name');
	         * @return When working with forms that contain array inputs
	         *
	         * @param $request->input('products.*.name');
	         * @return 
	         *
	         * You may also access user input using dynamic properties on the Illuminate\Http\Request instance.
	         * 
	         * @param $request->name;
	         * @return application’s forms contains a name field
	         *
	         * When sending JSON requests to your application request is properly set to application/json.
	         * 
	         * @param $request->input('user.name');
	         * @return You may even use “dot” syntax to dig into JSON arrays
	         *
	         * You may use the only and except methods Both of these methods accept a single array or a dynamic list of arguments:
	         * 
	         * @param $request->only('username', 'password');
	         * @return If you need to retrieve a subset of the input data
	         *
	         * @param $request->except('credit_card');
	         * @return If you need to retrieve a subset of the input data
	         *
	         * You should use the has method to determine if a value is present on the request
	         * 
	         * @param $request->has('name');
	         * @return if the value is present and is not an empty string
	         *
	         * The flash method on the Illuminate\Http\Request class
	         * 
	         * @param $request->flash();
	         * @return will flash the current input to the session so that it is available during the user’s next request to the application
	         *
	         * You may also use the flashOnly and flashExcept methods to flash a subset of the request data to the session.
	         * 
	         * @param $request->flashOnly(['username', 'email']);
	         * @return These methods are useful for keeping sensitive information such as passwords out of the session
	         *
	         * @param $request->flashExcept('password');
	         * @return These methods are useful for keeping sensitive information such as passwords out of the session
	         *
	         * To retrieve flashed input from the previous request, use the old method on the Request instance.
	         * 
	         * @param 	$request->old('username');
	         * @return 	The old method will pull the previously flashed input data from the session.
	         * 	
	         * @param 	<input type="text" name="username" value="{{ old('username') }}">
	         * @return  Laravel also provides a global old helper. If you are displaying old input within a Blade template. If no old input exists for the given field, null will be returned
	         *
	         * 
	         * 
	         * @param $request->cookie('name');
	         * @return 
	         *
	         * 
	         * 
	         * @param $request->file('photo');
	         * @return 
	         *
	         * 
	         * 
	         * @param $request->hasFile('photo');
	         * @return 
	         *
	         * 
	         * 
	         * @param $request->file('photo')->isValid();
	         * @return 
	         *
	         * 
	         * 
	         * @param $request->photo->path();
	         * @return 
	         *
	         * 
	         * 
	         * @param $request->photo->extension();
	         * @return 
	         *
	         * 
	         * 
	         * @param $request->photo->store('images');
	         * @return 
	         *
	         * 
	         * 
	         * @param $request->photo->store('images', 's3');
	         * @return 
	         *
	         * 
	         * 
	         * @param $request->photo->storeAs('images', 'filename.jpg');
	         * @return 
	         *
	         * 
	         * 
	         * @param $request->photo->storeAs('images', 'filename.jpg', 's3');
	         * @return 
	         */

    	//Laravel-FileSystem

    	//Laravel-CreatModels

    	//Laravel-ReadModels

    	//Laravel-UpdateModels

        //Laravel-DeleteModels

    	//Laravel-RelationModels

    	//Laravel-Flash

    	//Laravel-ReturnResponse
    	return '';

    }

    public function post(){
    	return view('test.test');
    }
}
