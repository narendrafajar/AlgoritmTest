<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Algoritm Test') }}
        </h2>
    </x-slot>
    <div class="row py-12">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="mb-3">
                <label for="">{{__('Algoritm Test')}}</label>
                <select name="selectTest" id="selectTest" class="form-control select2">
                    <option value="">{{__('Choose Test ..')}}</option>
                    <option value="0">{{__('Reverse String')}}</option>
                    <option value="1">{{__('Looping & Condition')}}</option>
                    <option value="2">{{__('Sorting Array')}}</option>
                    <option value="3">{{__('REST API')}}</option>
                    <option value="4">{{__('SQL Query')}}</option>
                    <option value="5">{{__('Palindrom')}}</option>
                </select>
            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-12" id="apiRestTest" style="display: none">
            <div class="mb-3">
                <label for="">{{__('REST Api Test Methode')}}</label>
                <select name="selectApi" id="selectApi" class="form-control select2" style="width: 100%">
                    <option value="">{{__('Choose Method Test API ..')}}</option>
                    <option value="0">{{__('GET')}}</option>
                    <option value="1">{{__('POST')}}</option>
                    <option value="2">{{__('PUT')}}</option>
                    <option value="3">{{__('Delete')}}</option>
                </select>
            </div>
        </div>
    </div>

    <div class="row" id="reverseString" style="display: none">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="mb-3">
                <label for="" class="form-label">{{__('Input String')}}</label>
                <input type="text" class="form-control" name="stringInput" id="stringInput">
            </div>
        </div>
    </div>
    <div class="row" id="loopingCondition" style="display: none">
        <div class="col-sm-12 col-md-12 col-lg-6">
            <div class="mb-3">
                <label for="" class="form-label">{{__('Input String')}}</label>
                <input type="text" class="form-control" name="stringInputLooping" id="stringInputLooping">
            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-6">
            <div class="mb-3">
                <label for="" class="form-label">{{__('Count Looping')}}</label>
                <input type="number" class="form-control text-center" name="numberLooping" id="numberLooping">
            </div>
        </div>
    </div>
    <div class="row" id="sortingArray" style="display: none">
        <div class="col-sm-12 col-md-12 col-lg-4">
            <div class="mb-3">
                <label for="" class="form-label">{{__('Input Array Number Or String')}}</label>
                <input type="text" class="form-control" name="arrayNumber" id="arrayNumber">
                <small><i class="text-danger">{{__('*Input with Coma (,) : 1,2,3,5....')}}</i></small>
            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-4">
            <div class="mb-3">
                <label for="" class="form-label">{{__('Methode')}}</label>
                <select name="selectMethodArray" id="selectMethodArray" class="form-control select2" style="width: 100%">
                    <option value="">{{__('Choose Array Methode ..')}}</option>
                    <option value="0">{{__('Original')}}</option>
                    <option value="1">{{__('Sort (Ascending)')}}</option>
                    <option value="2">{{__('Sort (Descending)')}}</option>
                    <option value="3">{{__('Filter Genap')}}</option>
                    <option value="4">{{__('Filter Ganjil')}}</option>
                    <option value="5">{{__('Map (Multiple 2)')}}</option>
                    <option value="6">{{__('Reduce (Total)')}}</option>
                    <option value="7">{{__('Find (> 3)')}}</option>
                    <option value="8">{{__('Every (> 0)')}}</option>
                    <option value="9">{{__('Some (> 3)')}}</option>
                    <option value="10">{{__('Reverse')}}</option>
                    <option value="11">{{__('Join ( - )')}}</option>
                </select>
            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-4">
            <div class="mb-3">
                <label for="" class="form-label">{{__('Mode')}}</label>
                <select name="selectModeArray" id="selectModeArray" class="form-control">
                    <option value="">{{__('Choose Array Mode ..')}}</option>
                    <option value="0">{{__('JS-Javascript (Frontend)')}}</option>
                    <option value="1">{{__('PHP - Controller (Backend)')}}</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row" id="apiRest" style="display: none">
        <div class="col-sm-12 col-md-12 col-lg-12">
            <div class="mb-3">
                <label for="apiData">{{__('Input Data (For POST/PUT)')}}</label>
                <input type="text" id="apiData" class="form-control" placeholder='{"key":"value"}'>
            </div>
        </div>
        {{-- <div class="col-sm-12 col-md-4 col-lg-4 text-center">
            <div class="mb-3">
                <button id="testApiBtn" class="btn btn-primary">Test API</button>
    
            </div>
        </div> --}}
        <div class="col-sm-12 col-md-4 col-lg-4 text-center">
            <div class="mb-3">
                <button id="getUser" class="btn btn-info">Get User</button>
    
            </div>
        </div>
        <div class="col-sm-12 col-md-4 col-lg-4 text-center">
            <div class="mb-3">
                <button id="logout" class="btn btn-danger">Logout</button>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12 text-center">
            <div class="mb-3">
                <button class="btn btn-primary" id="btnStart" type="button">{{__('Start Test !')}}</button>
            </div>
        </div>
    </div>
    <div class="row mt-4" id="output-result" style="display:none">
        <h2>{{__('Output :')}}</h2>
        <div class="row mt-3">
            <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="mb-3">
                    <label for="" class="form-label">{{__('Input String')}}</label>
                    <div class="form-control-plaintext"> <b id="stringOutput"></b></div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-6">
                <div class="mb-3">
                    <label for="" class="form-label">{{__('Result Function (String)')}}</label>
                    <div class="form-control-plaintext">
                        <pre id="stringResult" class="text-danger"></pre>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-12">
                <div class="mb-3">
                    <label for="" class="form-label">{{__('Explaination :')}}</label>
                    <div class="form-control-plaintext"> <b id="explain"></b></div>
                </div>
            </div>
        </div>
    </div>
    @section('additional_script')
        <script src="{{asset('build/dashboaard.js')}}"></script>
    @endsection
</x-app-layout>
