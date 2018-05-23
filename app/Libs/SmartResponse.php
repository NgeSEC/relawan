<?php
    class SmartResponse
    {
        public static $mInstance;

        /**
         * Singleton method
         *
         * @return Object
         */
        public static function getInstance(){
            return self::$mInstance;
        }

        /**
         * Init method
         *
         * @return Object
         */
        public static function init(){
            self::$mInstance = new SmartResponse();
        }

        /**
         * Method for final result
         *
         * @param Request $request
         * @param Response $response
         * @return String $data
         */
        private function formatData($response, $request=""){
            
            if(!isset($response['message'])){
                $response['message'] = trans('message.'.$response['code']);
            }
            
            if(request()->wantsJson()){
                unset($response['template']);
                if(!isset($response['data']['message'])){
                    $response['data']['message'] = $response['message'];
                }
                if(!isset($response['data']['code'])){
                    $response['data']['code'] = $response['code'];
                }
                return $response['data'];
            }else{
                if(isset($response['redirect'])){
                    $redirect = redirect($response['redirect'])->with('code',$response['code'])->with('message', $response['message']);
                    if($response['redirect']==''){
                        return back()->withInput();
                    }else{
                        return $redirect;
                    }
                }else{
                    $value = Request::header('Component');
                    if (view()->exists($response['template']))
                    {
                        return view($response['template'], $response['data']);
                    }    
                }
            }
        }

        /**
         * Method call for not not complete request
         *
         * @param Request $request
         * @param Response $response
         * @return String $data
         */
        public function requestNotComplete($response, $request=""){
            $response['code'] = '204';
            return $this->formatData($response, $request="");
        }

        /**
         * Method if data not found
         *
         * @param Request $request
         * @param Response $response
         * @return String $data
         */
        public function dataFound($response, $request=""){
            $response['code'] = '302';
            return $this->formatData($response, $request="");
        }

        /**
         * Method for request denied
         *
         * @param Request $request
         * @param Response $response
         * @return String $data
         */
        public function requestDenied($response, $request=""){
            $response['code'] = '401';
            return $this->formatData($response, $request="");
        }
        
        /**
         * Method if data not found
         *
         * @param Request $request
         * @param Response $response
         * @return String $data
         */
        public function dataNotFound($response, $request=""){
            $response['code'] = '404';
            return $this->formatData($response, $request="");
        }

        /**
         * Method for for forbidden access
         *
         * @param Request $request
         * @param Response $response
         * @return String $data
         */
        public function forbiddenAccess($response, $request=""){
            $response['code'] = '403';
            return $this->formatData($response, $request="");
        }
        
        /**
         * Method for save data failed
         *
         * @param Request $request
         * @param Response $response
         * @return String $data
         */
        public function saveDataFailed($response, $request=""){
            $response['code'] = '406';
            return $this->formatData($response, $request="");
        }
        
        /**
         * Method for save data success
         *
         * @param Request $request
         * @param Response $response
         * @return String $data
         */
        public function saveDataSuccess($response, $request=""){
            $response['code'] = '201';
            return $this->formatData($response, $request="");
        }

        /**
         * Method for success request
         *
         * @param Request $request
         * @param Response $response
         * @return String $data
         */
        public function success($response, $request=""){
            $response['code'] = '200';
            return $this->formatData($response, $request="");
        }
    }
    
    /**
     * init class
     */
    SmartResponse::init();

    function response_success($response, $request=""){
        return \SmartResponse::getInstance()->success($response, $request);
    }

    function response_empty($response, $request=""){
        return \SmartResponse::getInstance()->dataNotFound($response, $request);
    }

    function response_save_success($response, $request=""){
        return \SmartResponse::getInstance()->saveDataSuccess($response, $request);
    }

    function response_save_failed($response, $request=""){
        return \SmartResponse::getInstance()->saveDataFailed($response, $request);
    }