<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Person;

class PersonController extends Controller
{
    //CREATE API - POST
    public function createPerson(Request $request)
    {
        /*
         * VALIDATION : $request has a "validate" method. this methode accept two array. first a "rule array" that
         * in it we definite all rules of parameters validations like : type - maximum or minimum length - ...
         */
        $request->validate([

            'name' => 'required',
            'email' => 'required|email|unique:persons',
            'phone_no' => 'required',
            'gender' => 'required',
            'age' => 'required'

        ]);


        /*
         * CREATE DATA : after validation we have two options to create and save data inside the database.
         * first option: using "save" method
         * second option: using "create" method
         * in this case we use  "save" method
         */
        //1-using "save" method for create and save data
        $person = new Person();
        $person->name = $request->name;
        $person->email = $request->email;
        $person->phone_no = $request->phone_no;
        $person->gender = $request->gender;
        $person->age = $request->age;
        $person->save();


        //2-using "create" method for create and save data
        /*    Person::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'phone_no'=>$request->phone_no,
                'gender'=>$request->gender,
                'age'=>$request->age,
            ]);*/


        /*
         * SEND RESPONSE
         */

        return response()->json([
            'status' => 1,
            'message' => 'Person created successfully'

        ]);


    }

    //LIST PERSONS - GET
    public function listPerson()
    {
        $personsList = Person::get();

        /*
      * return response in temporary
      */
        /* return response()->json([
             'status'=>1,
             'message'=>'Listing Persons',
             'data'=>$personsList
         ],200);*/


        /*
         * Return response into an json array
         */
        return response()->json($personsList);

    }

    //SINGLE DETAIL API - GET
    public function getSinglePerson($id)
    {

        if (Person::where('id', $id)->exists()) {

            $person_details = Person::where('id', $id)->first();

            return response()->json($person_details);
        } else {

            return response()->json([

                'status' => 0,
                'message' => 'The person was not found!'

            ], 404);

        }

    }

    //UPDATE API - PUT
    public function updatePerson(Request $request, $id)
    {

        if (Person::where('id', $id)->exists()) {

            $person = Person::find($id);

            /*
            * For validation incoming data from client we use a Conditional phrase by using "!empty()" method
            */
            $person->name = !empty($request->name) ? $request->name : $person->name;
            $person->age = !empty($request->age) ? $request->age : $person->age;
            $person->email = !empty($request->email) ? $request->email : $person->email;
            $person->gender = !empty($request->gender) ? $request->gender : $person->gender;
            $person->phone_no = !empty($request->phone_no) ? $request->phone_no : $person->phone_no;

            $person->save();

            return response()->json([
                'status'=>1,
                'message'=>'The person updated successfully!'
            ],200);

        } else {
            return response()->json([

                'status' => 0,
                'message' => 'The person was not found!'

            ], 404);
        }

    }

    //DELETE API - DELETE
    public function deletePerson($id)
    {
        if (Person::where('id',$id)->exists()){

            $person=Person::find($id);
            $person->delete();

            return response()->json([
                'status'=>1,
                'message'=>'The person deleted successfully!!'
            ]);

        }else{
            return response()->json([

                'status' => 0,
                'message' => 'The person was not found!'

            ], 404);

        }

    }
}
