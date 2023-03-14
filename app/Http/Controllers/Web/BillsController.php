<?php

namespace Vanguard\Http\Controllers\Web;

use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Vanguard\Http\Controllers\Controller;
use Vanguard\Transaction;
use Session;
use Auth;

class BillsController extends Controller
{
    /**
     * Displays the application dashboard.
     *
     * @return Factory|View
     */
    public function airtimeindex()
    {
        //$token = $this->getToken();
        return view('bills.airtime.index');
    }
    public function airtimestep1(Request $request)
    {
        //$token = $this->getToken();
        if(!$request->filled('email' )|| !$request->filled('tel'))
        {
         return redirect()->route('airtime')->withErrors(__('Please fill the form to proceed with airtime purchase'));
        }
        else{
            Session::put('bemail', $request->email);
            Session::put('bphone', $request->tel);
            return redirect()->route('airtime.step2')->withSuccess(__('Please enter an amount and select service provider to continue'));
        }
    }
    public function airtimestep2(Request $request)
    {
        //$token = $this->getToken();
        if(Session::get('bemail'))
        {
            $countryData = (array)json_decode(file_get_contents(resource_path('views/partials/country.json')));
            $operatorData = (array)json_decode(file_get_contents(resource_path('views/partials/operators.json')));
            $country = $countryData;
            //$reply = json_decode($operatorData, true);
            $operators = $operatorData['content'];
            //return $operators['content'];  
            /*
                    $curl = curl_init();
                    curl_setopt_array($curl, array(
                    CURLOPT_URL => 'https://topups.reloadly.com/operators?includeBundles=true&includeData=true&suggestedAmountsMap=true&size=1000&page=',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'GET',
                    CURLOPT_HTTPHEADER => array(
                        'Authorization: Bearer eyJraWQiOiIwMDA1YzFmMC0xMjQ3LTRmNmUtYjU2ZC1jM2ZkZDVmMzhhOTIiLCJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiIxOTMwNyIsImlzcyI6Imh0dHBzOi8vcmVsb2FkbHkuYXV0aDAuY29tLyIsImh0dHBzOi8vcmVsb2FkbHkuY29tL3NhbmRib3giOmZhbHNlLCJodHRwczovL3JlbG9hZGx5LmNvbS9wcmVwYWlkVXNlcklkIjoiMTkzMDciLCJndHkiOiJjbGllbnQtY3JlZGVudGlhbHMiLCJhdWQiOiJodHRwczovL3RvcHVwcy1oczI1Ni5yZWxvYWRseS5jb20iLCJuYmYiOjE2Nzg3MDczNjYsImF6cCI6IjE5MzA3Iiwic2NvcGUiOiJzZW5kLXRvcHVwcyByZWFkLW9wZXJhdG9ycyByZWFkLXByb21vdGlvbnMgcmVhZC10b3B1cHMtaGlzdG9yeSByZWFkLXByZXBhaWQtYmFsYW5jZSByZWFkLXByZXBhaWQtY29tbWlzc2lvbnMiLCJleHAiOjE2ODM4OTEzNjYsImh0dHBzOi8vcmVsb2FkbHkuY29tL2p0aSI6IjMwYjc4ZmViLThhODItNGYyZi1iNDExLWEyMDAyOTc0NGZlNiIsImlhdCI6MTY3ODcwNzM2NiwianRpIjoiYjIyOGU5Y2MtZGVkOC00YmYxLWJlYjEtZTlhMjg0NTFkYzY5In0.p_6RKeZHAvp690hCtt0i_oVjv1AqLftzjPX4qo-1A7w'
                    ),
                    ));
                    $response = curl_exec($curl);
                    curl_close($curl);
                    $reply = json_decode($response, true);
                    $operators = $reply['content'];  
            */
                    return view('bills.airtime.step2',compact('country','operators'));
        }
        return redirect()->route('airtime')->withErrors(__('Please fill the form to proceed with airtime purchase'));

    }

    public function submitoperator(Request $request)
    {
         
        if(!$request->filled('amount' )|| !$request->filled('countryCode') || !$request->filled('operatorId'))
        {
         return redirect()->route('airtime.step2')->withErrors(__('Please fill the form to proceed with airtime purchase'));
        }
        else
        {
            Session::put('amount', $request->amount);
            Session::put('operatorId', $request->operatorId);
            Session::put('operatorName', $request->operatorname);
            Session::put('countryName', $request->countryname);
            Session::put('countryCode', $request->countryCode);
            Session::put('countryCurrency', $request->countrycurrency);
            Session::put('countryContinent', $request->countrycontinent);

            $recipientEmail = Session::get('bemail');
            $phonenumber = Session::get('bphone');
            $countryCode = Session::get('countryCode');
            $currency = Session::get('countryCurrency');
            $amount = Session::get('amount');
            $operatorId = Session::get('operatorId');
            $receiver_name = explode('@', $recipientEmail)[0];
            $code = rand(1000000000000000, 99999998984532);
            // CALL MGPS ENDPOING \\
            $curl = curl_init();
            curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://ap.gateway.mastercard.com/api/nvp/version/67',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => 'apiOperation=INITIATE_CHECKOUT&apiPassword=5a630fdac72499e201655c23d7c8480e&apiUsername=merchant.PNLBDNG&merchant=PNLBDNG&interaction.operation=PURCHASE&interaction.merchant.name='.$receiver_name.'&interaction.merchant.email='.$recipientEmail.'&interaction.merchant.phone='.$phonenumber.'&interaction.returnUrl='.route('verifypayment',encrypt($code)).'&order.id='.$code.'&order.amount=1.00&order.currency='.$currency.'&order.description=Airtime%20Purchase&order.reference='.$code,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/x-www-form-urlencoded'
            ),
            ));
            $response = curl_exec($curl);
            curl_close($curl);
            $queryString = $response;
            parse_str($queryString, $queryArray);
            //return $queryArray;

            $sessionId = @$queryArray['session_id'];
            //return $sessionId;
            if(empty($sessionId))
            {
                //return $queryArray['session_id'];
             return back()->withErrors(__(@$queryArray['error_explanation'].' Please try again later'));
            }
            
           
            // print the value of session.id
            $transaction = new Transaction();
            $transaction->user_id = Auth::user()->id;
            $transaction->email = $recipientEmail;
            $transaction->phone = $phonenumber;
            $transaction->amount = $amount;
            $transaction->currency = $currency;
            $transaction->country_code = $countryCode;
            $transaction->trx_type = 'airtime';
            $transaction->trx = $code;
            $transaction->session_id = $sessionId;
            $transaction->type = 'debit';
            $transaction->provider = Session::get('operatorName');
            $transaction->provider_id = $operatorId;
            $transaction->status = 'pending';
            $transaction->save();
           
            return redirect()->route('airtime.step3',encrypt($sessionId))->withSuccess(__('Please enter and amount and select service provider to continue'));
        }
        return redirect()->route('airtime')->withErrors(__('Please fill the form to proceed with airtime purchase'));

    }
    public function airtimestep3(Request $request, $id = null)
    {
         
        if(!Session::get('operatorId') || !Session::get('countryCode') || !Session::get('amount'))
        {
            return redirect()->route('airtime')->withErrors(__('Please fill the form to proceed with airtime purchase'));
        }
        else
        {
            $data['sessionid'] = decrypt($id);
            $sessionid = decrypt($id);
            //return $sessionid;
            $transaction =  Transaction::whereSessionId($sessionid)->firstorFail();
            if($transaction->status != 'pending')
            {
                return redirect()->route('airtime')->withErrors(__('You cannot proceed with this operation at the moment'));  
            }
            return view('bills.airtime.step3',$data);
        }
        return redirect()->route('airtime')->withErrors(__('Please fill the form to proceed with airtime purchase'));

    }

    public function airtimeprocess(Request $request)
    {
        $recipientEmail = Session::get('bemail');
        $phonenumber = Session::get('bphone');
        $countryCode = Session::get('countryCode');
        $amount = Session::get('amount');
        $operatorId = Session::get('operatorId');
        $token = $this->getToken();
        $receiver_name = explode('@', $recipientEmail)[0];

        


        // START AIRTIME VENDING \\
        /*
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://topups.reloadly.com/topups',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_POSTFIELDS =>'{
            "operatorId": '.$operatorId.',
            "amount": '.$amount.',
            "useLocalAmount": true,
            "customIdentifier": '.rand(1000000,999999).',
            "recipientEmail": '.$recipientEmail.',
            "recipientPhone": {
                "countryCode": '.$countryCode.',
                "number": '.$phonenumber.'
            },
            "senderPhone": {
                "countryCode": '.$countryCode.',
                "number": '.$phonenumber.'
            }
        }',
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer '.$token.'',
            'Content-Type: application/json'
        ),
        ));
        $response = curl_exec($curl);
       
        curl_close($curl);
        var_dump($response);
         */

        //return $response;
        // END AIRTIME VENDING \\

       return $operatorId; 
    }

    public function buyairtimeprocess($id)
    {
        $trx = decrypt($id);
        $transaction =  Transaction::whereTrx($trx)->firstorFail();
        $recipientEmail = $transaction->email;
        $phonenumber = $transaction->phone;
        $countryCode = $transaction->country_code;
        $amount = $transaction->amount;
        $operatorId = $transaction->provider_id;
        $token = $this->getToken();
        $receiver_name = explode('@', $recipientEmail)[0];

        
        // START AIRTIME VENDING \\
        /*
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://topups.reloadly.com/topups',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
        CURLOPT_POSTFIELDS =>'{
            "operatorId": '.$operatorId.',
            "amount": '.$amount.',
            "useLocalAmount": true,
            "customIdentifier": '.rand(1000000,999999).',
            "recipientEmail": '.$recipientEmail.',
            "recipientPhone": {
                "countryCode": '.$countryCode.',
                "number": '.$phonenumber.'
            },
            "senderPhone": {
                "countryCode": '.$countryCode.',
                "number": '.$phonenumber.'
            }
        }',
        CURLOPT_HTTPHEADER => array(
            'Authorization: Bearer '.$token.'',
            'Content-Type: application/json'
        ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        var_dump($response);
         */

        //return $response;
        // END AIRTIME VENDING \\
        $transaction->status = 'success';
        $transaction->save();
    }

    public function getToken()
    {
        
        $curl = curl_init();
        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://auth.reloadly.com/oauth/token',
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'POST',
        CURLOPT_POSTFIELDS =>'{
            "client_id": "WJIWfg4L6u075FcJvd3ftbIrTy9XzluC",
            "client_secret": "JV2ZK89PfQ-3D5mh21pqBAF7oYM25b-809VHS1Hc9qKTEzcaQwtghdauBnT3q9f",
            "grant_type": "client_credentials",
            "audience": "https://topups.reloadly.com"
        }',
        CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json'
        ),
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $reply = json_decode($response,true);
        return $reply['access_token'];
    }

    public function verifypayment($id)
    {
            //return encrypt(874282814942059);
            $trx = decrypt($id);
            $transaction =  Transaction::whereTrx($trx)->firstorFail();
            if($transaction->status == 'pending')
            {
                // START PAYMENT VERIFICATION \\
                $this->buyairtimeprocess($id);
                return redirect()->route('dashboard')->withSuccess(__('Airtime Pucahse Wass Successful Successful')); 
                // END PAYMENT VERIFICATION \\ 
            }
            //return $transaction;
            return redirect()->route('dashboard')->withErrors(__('This operation cannot be completed at the moment. Please try again later'));

    }
}
