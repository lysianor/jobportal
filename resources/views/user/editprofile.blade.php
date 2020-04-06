@extends('layouts.homeuser')

@section('content')
<style>

</style>
<div class="image_sec" style="background: url(../images/profile_banner.png">
    <div class="container">
    <div class="row">
          
        <div class="col-lg-12">
            <div class="profile_img">
                <img src="/uploads/avatar/{{ Auth::user()->avatar }}" alt="Profile Picture"/>            
            </div>

            <div class="profilie_right">
                <em>{{Auth::user()->first_name}} {{Auth::user()->last_name}}</em>
            </div>
        </div>
        </div>
    </div>    
 </div>
    <div class="account_cntn">
        <div class="container">
            <div class="my_acc">
                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
@include ('dashboard.dashboarduser')
<div class="col-lg-9 col-sm-9">
    <div class="info_dv info_dv_esdit_pre">
        <div class="heads"><i class="fa fa-pencil">&nbsp;Edit Profile Information</div></i>
            <div class="information_cntn" style="position:inherit !important;">
            <div style="width:100%;"></div>

               @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success')}}
                    </div>
                @endif
                @if(session('warning'))
                    <div class="alert alert-warning">
                        {{ session('warning')}}
                    </div>
                @endif

                <form action="{{ route('user.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf   
                

                <div class="form_lst">
                    <label>First Name <span class="star_red">*</span></label>
                    <span class="rltv">
                        <input id="first_name" value="{{ ucwords($user->first_name)}}" type="text" maxlength="20" placeholder="First Name" class="form-control @error('first_name') is-invalid @enderror" name="first_name"  required autocomplete="first_name">
                            @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror  
                    </span>
                </div>

                <div class="form_lst">
                    <label>Middle Name</label>
                    <span class="rltv">
                        <input id="middle_name" value="{{ ucwords($user->middle_name)}}" type="text" maxlength="20" placeholder="Middle Name" class="form-control @error('middle_name') is-invalid @enderror" name="middle_name">
                            @error('middle_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror  
                    </span>
                </div>

                <div class="form_lst">
                    <label>Last Name <span class="star_red">*</span></label>
                    <span class="rltv">
                        <input id="last_name" type="text" maxlength="20" placeholder="Last Name" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ucwords($user->last_name)}}" required autocomplete="last_name">
                            @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror  
                    </span>
                </div>

                <div class="form_lst">
                    <label>Gender<span class="star_red">*</span></label>
                    <span class="rltv">
                        <select name="gender" class="form-control @error('gender') is-invalid @enderror" id="gender" required autocomplete="gender">
                            <option value="">Select Gender</option>
                            <option value="Male" {{ $user->gender == 'Male' ? 'selected' : ''}}>Male</option>
                            <option value="Female" {{ $user->gender == 'Female' ? 'selected' : ''}}>Female</option>
                            <option value="Other" {{ $user->gender == 'Other' ? 'selected' : ''}}>Other</option>
                            
                        </select>
                        @error('gender')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror  
                    </span>
                </div>

                <div class="form_lst">
                    <label>Date of Birth<span class="star_red">*</span></label>
                    <span class="rltv">
                        <input type="date" value="{{$user->birthday}}"  name="birthday"  class="form-control @error('birthday') is-invalid @enderror" id="birthday" >
                        @error('birthday')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror  
                    </span>
                </div>

                <div class="form_lst">
                        <label>Nationality<span class="star_red">*</span></label>
                        <span class="rltv">
                            <select id="nationality" name="nationality" class="form-control @error('nationality') is-invalid @enderror" >
                                <option value="">Select Nationality</option>
                                <option value="Afghan">
                                Afghan</option>
                                <option value="Albanian">
                                Albanian</option>
                                <option value="Algerian">
                                Algerian</option>
                                <option value="American">
                                American</option>
                                <option value="Andorran">
                                Andorran</option>
                                <option value="Angolan">
                                Angolan</option>
                                <option value="Antiguans, Barbudans">
                                Antiguans, Barbudans</option>
                                <option value="Argentinean">
                                Argentinean</option>
                                <option value="Armenian">
                                Armenian</option>
                                <option value="Australian">
                                Australian</option>
                                <option value="Austrian">
                                Austrian</option>
                                <option value="Azerbaijani">
                                Azerbaijani</option>
                                <option value="Bahamian">
                                Bahamian</option>
                                <option value="Bahraini">
                                Bahraini</option>
                                <option value="Bangladeshi">
                                Bangladeshi</option>
                                <option value="Barbadian">
                                Barbadian</option>
                                <option value="Belarusian">
                                Belarusian</option>
                                <option value="Belgian">
                                Belgian</option>
                                <option value="Belizean">
                                Belizean</option>
                                <option value="Beninese">
                                Beninese</option>
                                <option value="Bhutanese">
                                Bhutanese</option>
                                <option value="Bolivian">
                                Bolivian</option>
                                <option value="Bosnian, Herzegovinian">
                                Bosnian, Herzegovinian</option>
                                <option value="Brazilian">
                                Brazilian</option>
                                <option value="British">
                                British</option>
                                <option value="Bruneian">
                                Bruneian</option>
                                <option value="Bulgarian">
                                Bulgarian</option>
                                <option value="Burkinabe">
                                Burkinabe</option>
                                <option value="Burmese">
                                Burmese</option>
                                <option value="Burundian">
                                Burundian</option>
                                <option value="Cambodian">
                                Cambodian</option>
                                <option value="Cameroonian">
                                Cameroonian</option>
                                <option value="Canadian">
                                Canadian</option>
                                <option value="Cape Verdian">
                                Cape Verdian</option>
                                <option value="Central African">
                                Central African</option>
                                <option value="Chadian">
                                Chadian</option>    
                                <option value="Chilean">
                                Chilean</option>
                                <option value="Chinese">
                                Chinese</option>
                                <option value="Colombian">
                                Colombian</option>
                                <option value="Comoran">
                                Comoran</option>
                                <option value="Congolese">
                                Congolese</option>
                                <option value="Costa Rican">
                                Costa Rican</option>
                                <option value="Croatian">
                                Croatian</option>
                                <option value="Cuban">
                                Cuban</option>
                                <option value="Cypriot">
                                Cypriot</option>
                                <option value="Czech">
                                Czech</option>
                                <option value="Danish">
                                Danish</option>
                                <option value="Djibouti">
                                Djibouti</option>
                                <option value="Dominican">
                                Dominican</option>
                                <option value="Dutch">
                                Dutch</option>
                                <option value="East Timorese">
                                East Timorese</option>
                                <option value="Ecuadorean">
                                Ecuadorean</option>
                                <option value="Egyptian">
                                Egyptian</option>
                                <option value="Emirian">
                                Emirian</option>
                                <option value="Equatorial Guinean">
                                Equatorial Guinean</option>
                                <option value="Eritrean">
                                Eritrean</option>
                                <option value="Estonian">
                                Estonian</option>
                                <option value="Ethiopian">
                                Ethiopian</option>
                                <option value="Fijian">
                                Fijian</option>
                                <option value="Filipino">
                                Filipino</option>
                                <option value="Finnish">
                                Finnish</option>
                                <option value="French">
                                French</option>
                                <option value="Gabonese">
                                Gabonese</option>
                                <option value="Gambian">
                                Gambian</option>
                                <option value="Georgian">
                                Georgian</option>
                                <option value="German">
                                German</option>
                                <option value="Ghanaian">
                                Ghanaian</option>
                                <option value="Greek">
                                Greek</option>
                                <option value="Grenadian">
                                Grenadian</option>
                                <option value="Guatemalan">
                                Guatemalan</option>
                                <option value="Guinea-Bissauan">
                                Guinea-Bissauan</option>
                                <option value="Guinean">
                                Guinean</option>
                                <option value="Guyanese">
                                Guyanese</option>
                                <option value="Haitian">
                                Haitian</option>
                                <option value="Honduran">
                                Honduran</option>
                                <option value="Hungarian">
                                Hungarian</option>
                                <option value="I-Kiribati">
                                I-Kiribati</option>
                                <option value="Icelander">
                                Icelander</option>
                                <option value="Indian">
                                Indian</option>
                                <option value="Indonesian">
                                Indonesian</option>
                                <option value="Iranian">
                                Iranian</option>
                                <option value="Iraqi">
                                Iraqi</option>
                                <option value="Irish">
                                Irish</option>
                                <option value="Israeli">
                                Israeli</option>
                                <option value="Italian">
                                Italian</option>
                                <option value="Ivorian">
                                Ivorian</option>
                                <option value="Jamaican">
                                Jamaican</option>
                                <option value="Japanese">
                                Japanese</option>
                                <option value="Jordanian">
                                Jordanian</option>
                                <option value="Kazakhstani">
                                Kazakhstani</option>
                                <option value="Kenyan">
                                Kenyan</option>
                                <option value="Kirghiz">
                                Kirghiz</option>
                                <option value="Kittian and Nevisian">
                                Kittian and Nevisian</option>
                                <option value="Kuwaiti">
                                Kuwaiti</option>
                                <option value="Laotian">
                                Laotian</option>
                                <option value="Latvian">
                                Latvian</option>
                                <option value="Lebanese">
                                Lebanese</option>
                                <option value="Liberian">
                                Liberian</option>
                                <option value="Libyan">
                                Libyan</option>
                                <option value="Liechtensteiner">
                                Liechtensteiner</option>
                                <option value="Lithuanian">
                                Lithuanian</option>
                                <option value="Luxembourger">
                                Luxembourger</option>
                                <option value="Macedonian">
                                Macedonian</option>
                                <option value="Malagasy">
                                Malagasy</option>
                                <option value="Malawian">
                                Malawian</option>
                                <option value="Malaysian">
                                Malaysian</option>
                                <option value="Maldivan">
                                Maldivan</option>
                                <option value="Malian">
                                Malian</option>
                                <option value="Maltese">
                                Maltese</option>
                                <option value="Marshallese">
                                Marshallese</option>
                                <option value="Mauritanian">
                                Mauritanian</option>
                                <option value="Mauritian">
                                Mauritian</option>
                                <option value="Mexican">
                                Mexican</option>
                                <option value="Micronesian">
                                Micronesian</option>
                                <option value="Moldovan">
                                Moldovan</option>
                                <option value="Monegasque">
                                Monegasque</option>
                                <option value="Mongolian">
                                Mongolian</option>
                                <option value="Moroccan">
                                Moroccan</option>
                                <option value="Mosotho">
                                Mosotho</option>
                                <option value="Motswana (singular), Batswana (plural)">
                                Motswana (singular), Batswana (plural)</option>
                                <option value="Mozambican">
                                Mozambican</option>
                                <option value="Namibian">
                                Namibian</option>
                                <option value="Nauruan">
                                Nauruan</option>
                                <option value="Nepalese">
                                Nepalese</option>
                                <option value="New Zealander">
                                New Zealander</option>
                                <option value="Ni-Vanuatu">
                                Ni-Vanuatu</option>
                                <option value="Nicaraguan">
                                Nicaraguan</option>
                                <option value="Nigerian">
                                Nigerian</option>
                                <option value="Nigerien">
                                Nigerien</option>
                                <option value="North Korean">
                                North Korean</option>
                                <option value="Norwegian">
                                Norwegian</option>
                                <option value="Omani">
                                Omani</option>
                                <option value="Pakistani">
                                Pakistani</option>
                                <option value="Palauan">
                                Palauan</option>
                                <option value="Panamanian">
                                Panamanian</option>
                                <option value="Papua New Guinean">
                                Papua New Guinean</option>
                                <option value="Paraguayan">
                                Paraguayan</option>
                                <option value="Peruvian">
                                Peruvian</option>
                                <option value="Polish">
                                Polish</option>
                                <option value="Portuguese">
                                Portuguese</option>
                                <option value="Qatari">
                                Qatari</option>
                                <option value="Romanian">
                                Romanian</option>
                                <option value="Russian">
                                Russian</option>
                                <option value="Rwandan">
                                Rwandan</option>
                                <option value="Saint Lucian">
                                Saint Lucian</option>
                                <option value="Salvadoran">
                                Salvadoran</option>
                                <option value="Sammarinese">
                                Sammarinese</option>
                                <option value="Samoan">
                                Samoan</option>
                                <option value="Sao Tomean">
                                Sao Tomean</option>
                                <option value="Saudi Arabian">
                                Saudi Arabian</option>
                                <option value="Senegalese">
                                Senegalese</option>
                                <option value="Serbian">
                                Serbian</option>
                                <option value="Seychellois">
                                Seychellois</option>
                                <option value="Sierra Leonean">
                                Sierra Leonean</option>
                                <option value="Singaporean">
                                Singaporean</option>
                                <option value="Slovak">
                                Slovak</option>
                                <option value="Slovene">
                                Slovene</option>
                                <option value="Solomon Islander">
                                Solomon Islander</option>
                                <option value="Somali">
                                Somali</option>
                                <option value="South African">
                                South African</option>
                                <option value="South Korean">
                                South Korean</option>
                                <option value="Spanish">
                                Spanish</option>
                                <option value="Sri Lankan">
                                Sri Lankan</option>
                                <option value="Sudanese">
                                Sudanese</option>
                                <option value="Surinamer">
                                Surinamer</option>
                                <option value="Swazi">
                                Swazi</option>
                                <option value="Swedish">
                                Swedish</option>
                                <option value="Swiss">
                                Swiss</option>
                                <option value="Syrian">
                                Syrian</option>
                                <option value="Tadzhik">
                                Tadzhik</option>
                                <option value="Taiwanese">
                                Taiwanese</option>
                                <option value="Tanzanian">
                                Tanzanian</option>
                                <option value="Thai">
                                Thai</option>
                                <option value="Togolese">
                                Togolese</option>
                                <option value="Tongan">
                                Tongan</option>
                                <option value="Trinidadian">
                                Trinidadian</option>
                                <option value="Tunisian">
                                Tunisian</option>
                                <option value="Turkish">
                                Turkish</option>
                                <option value="Turkmen">
                                Turkmen</option>
                                <option value="Tuvaluan">
                                Tuvaluan</option>
                                <option value="Ugandan">
                                Ugandan</option>
                                <option value="Ukrainian">
                                Ukrainian</option>
                                <option value="Uruguayan">
                                Uruguayan</option>
                                <option value="Uzbekistani">
                                Uzbekistani</option>
                                <option value="Venezuelan">
                                Venezuelan</option>
                                <option value="Vietnamese">
                                Vietnamese</option>
                                <option value="Yemeni">
                                Yemeni</option>
                                <option value="Zambian">
                                Zambian</option>
                                <option value="Zimbabwean">
                                Zimbabwean</option>
                                <option value="None">
                                None</option>
                                </select>
                            @error('gender')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror  
                        </span>
                    </div>


                <div class="form_lst">
                    <label>Address <div class="star_red">*</div></label>
                    <div id="locDiv" class="rltv">
                        <input id="address" type="text" placeholder="123 Main St" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ $user->address}}" required autocomplete="address">
                           
                    </div>
                </div>

                <div class="form_lst">
                    <label>State<div class="star_red">*</div></label>
                    <div id="locDiv" class="rltv">
                        <input id="state" type="text" placeholder="City" class="form-control @error('state') is-invalid @enderror" name="state" value="{{ $user->state}}" required autocomplete="state">
                            @error('state')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror                                     
                    </div>
                </div>

                <div class="form_lst">
                    <label>City<div class="star_red">*</div></label>
                    <div id="locDiv" class="rltv">
                        <input id="city" type="text" placeholder="Province" class="form-control validname @error('city') is-invalid @enderror" name="city" value="{{ $user->city}}" required autocomplete="city">
                            @error('city')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror                                     
                    </div>
                </div>

                <div class="form_lst">
                    <label>Contact Number<span class="star_red">*</span> &nbsp;<span class="help-tip"><p>8 Digit Landline number with area code or 11 digit phone number</p></span></label>
                    <span class="rltv">
                         <input id="contact_number" type="text" maxlength="11" placeholder="09012345678" class="form-control validname @error('contact_number') is-invalid @enderror" name="contact_number" value="{{ $user->contact_number}}" required autocomplete="contact_number">
                            @error('contact_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror                                       
                    </span>
                </div>

                <div class="form_lst">
                    <label>Interest Categories <div class="star_red">*</div></label>
                    <div id="locDiv" class="rltv">
                        <select name="interest" class="form-control @error('interest') is-invalid @enderror" value="{{ $user->interest}} "id="interest" required autocomplete="interest">
                            <option value=''>All Interest Categories</option>

                            <optgroup class="optgroup" label="Accounting/Finance">
                                <option value="All Accounting/Finance" {{ $user->interest == 'All Accounting/Finance' ? 'selected' : ''}} class="opt-indent">All Accounting/Finance</option>
                                <option value="Audit & Taxation" {{ $user->interest == 'Audit & Taxation' ? 'selected' : ''}} class="opt-indent">Audit &amp; Taxation</option>
                                <option value="Banking/Financial" {{ $user->interest == 'Banking/Financial' ? 'selected' : ''}} class="opt-indent">Banking/Financial</option>
                                <option value="Corporate Finance/Investment" {{ $user->interest == 'Corporate Finance/Investment' ? 'selected' : ''}} class="opt-indent">Corporate Finance/Investment</option>
                                <option value="General/Cost Accounting" {{ $user->interest == 'General/Cost Accounting' ? 'selected' : ''}} class="opt-indent">General/Cost Accounting</option>
                            </optgroup>

                            <optgroup class="optgroup" label="Admin/Human Resources">
                                <option value="All Admin/Human Resources" {{ $user->interest == 'All Admin/Human Resources' ? 'selected' : ''}} class="opt-indent">All Admin/Human Resources</option>
                                <option value="Clerical/Administrative" {{ $user->interest == 'Clerical/Administrative' ? 'selected' : ''}} class="opt-indent">Clerical/Administrative</option>
                                <option value="Human Resources" {{ $user->interest == 'Human Resources' ? 'selected' : ''}} class="opt-indent">Human Resources</option>
                                <option value="Secretarial" {{ $user->interest == 'Secretarial' ? 'selected' : ''}} class="opt-indent">Secretarial</option>
                                <option value="Top Management" {{ $user->interest == 'Top Management' ? 'selected' : ''}} class="opt-indent">Top Management</option>
                            </optgroup>

                            <optgroup class="optgroup" label="Arts/Media/Communications">
                                <option value="All Arts/Media/Communications" {{ $user->interest == 'All Arts/Media/Communications' ? 'selected' : ''}} class="opt-indent">All Arts/Media/Communications</option>
                                <option value="Advertising" {{ $user->interest == 'Advertising' ? 'selected' : ''}} class="opt-indent">Advertising</option>
                                <option value="Arts/Creative Design" {{ $user->interest == 'Arts/Creative Design' ? 'selected' : ''}} class="opt-indent">Arts/Creative Design</option>
                                <option value="Entertainment" {{ $user->interest == 'Entertainment' ? 'selected' : ''}} class="opt-indent">Entertainment</option>
                                <option value="Public Relations" {{ $user->interest == 'Public Relations' ? 'selected' : ''}} class="opt-indent">Public Relations</option>
                            </optgroup>

                            <optgroup class="optgroup" label="Building/Construction">
                                <option value="All Building/Construction" {{ $user->interest == 'All Building/Construction' ? 'selected' : ''}} class="opt-indent">All Building/Construction</option>
                                <option value="Architect/Interior Design" {{ $user->interest == 'Architect/Interior Design' ? 'selected' : ''}} class="opt-indent">Architect/Interior Design</option>
                                <option value="Civil Engineering/Construction" {{ $user->interest == 'Civil Engineering/Construction' ? 'selected' : ''}} class="opt-indent">Civil Engineering/Construction</option>
                                <option value="Property/Real Estate" {{ $user->interest == 'Property/Real Estate' ? 'selected' : ''}} class="opt-indent">Property/Real Estate</option>
                                <option value="Quantity Surveying" {{ $user->interest == 'Quantity Surveying' ? 'selected' : ''}} class="opt-indent">Quantity Surveying</option>
                            </optgroup>

                            <optgroup class="optgroup" label="Computer/Information Technology">
                                <option value="All Computer/Information Technology" {{ $user->interest == 'All Computer/Information Technology' ? 'selected' : ''}} class="opt-indent">All Computer/Information Technology</option>
                                <option value="IT - Hardware" {{ $user->interest == 'IT - Hardware' ? 'selected' : ''}} class="opt-indent">IT - Hardware</option>
                                <option value="IT - Network/Sys/DB Admin" {{ $user->interest == 'IT - Network/Sys/DB Admin' ? 'selected' : ''}} class="opt-indent">IT - Network/Sys/DB Admin</option>
                                <option value="IT - Software" {{ $user->interest == 'IT - Software' ? 'selected' : ''}} class="opt-indent">IT - Software</option>
                            </optgroup>

                            <optgroup class="optgroup" label="Education/Training">
                                <option value="All Education/Training" {{ $user->interest == 'All Education/Training' ? 'selected' : ''}} class="opt-indent">All Education/Training</option>
                                <option value="Education" {{ $user->interest == 'Education' ? 'selected' : ''}} class="opt-indent">Education</option>
                                <option value="Training" {{ $user->interest == 'Training' ? 'selected' : ''}} class="opt-indent">Training &amp; Dev.</option>
                            </optgroup>

                            <optgroup class="optgroup" label="Engineering">
                                <option value="185,186,187,188,189,190,195,200" {{ $user->interest == 'None' ? 'selected' : ''}} class="opt-indent">All Engineering</option>
                                <option value="Chemical Engineering" {{ $user->interest == 'Chemical Engineering' ? 'selected' : ''}} class="opt-indent">Chemical Engineering</option>
                                <option value="Electrical Engineering" {{ $user->interest == 'Electrical Engineering' ? 'selected' : ''}} class="opt-indent">Electrical Engineering</option>
                                <option value="Electronics Engineering" {{ $user->interest == 'Electronics Engineering' ? 'selected' : ''}} lass="opt-indent">Electronics Engineering</option>
                                <option value="Environmental Engineering" {{ $user->interest == 'Environmental Engineering' ? 'selected' : ''}} class="opt-indent">Environmental Engineering</option>
                                <option value="Industrial Engineering" {{ $user->interest == 'Industrial Engineering' ? 'selected' : ''}} class="opt-indent">Industrial Engineering</option>
                                <option value="Mechanical/Automotive Engineering" {{ $user->interest == 'Mechanical/Automotive Engineering' ? 'selected' : ''}} class="opt-indent">Mechanical/Automotive Engineering</option>
                                <option value="Oil/Gas Engineering" {{ $user->interest == 'Oil/Gas Engineering' ? 'selected' : ''}} class="opt-indent">Oil/Gas Engineering</option>
                                <option value="Other Engineering" {{ $user->interest == 'Other Engineering' ? 'selected' : ''}} class="opt-indent">Other Engineering</option>
                            </optgroup>

                            <optgroup class="optgroup" label="Healthcare">
                                <option value="All Healthcare" {{ $user->interest == 'All Healthcare' ? 'selected' : ''}} class="opt-indent">All Healthcare</option>
                                <option value="Doctor/Diagnosis" {{ $user->interest == 'Doctor/Diagnosis' ? 'selected' : ''}} class="opt-indent">Doctor/Diagnosis</option>
                                <option value="Pharmacy" {{ $user->interest == 'Pharmacy' ? 'selected' : ''}} class="opt-indent">Pharmacy</option>
                                <option value="Nurse/Medical Support" {{ $user->interest == 'Nurse/Medical Support' ? 'selected' : ''}} class="opt-indent">Nurse/Medical Support</option>
                            </optgroup>

                            <optgroup class="optgroup" label="Hotel/Restaurant">
                                <option value="All Hotel/Restaurant" {{ $user->interest == 'All Hotel/Restaurant' ? 'selected' : ''}} class="opt-indent">All Hotel/Restaurant</option>
                                <option value="Food/Beverage/Restaurant" {{ $user->interest == 'Food/Beverage/Restaurant' ? 'selected' : ''}} class="opt-indent">Food/Beverage/Restaurant</option>
                                <option value="Hotel/Tourism" {{ $user->interest == 'Hotel/Tourism' ? 'selected' : ''}} class="opt-indent">Hotel/Tourism</option>
                            </optgroup>

                            <optgroup class="optgroup" label="Manufacturing">
                                <option value="All Manufacturing" {{ $user->interest == 'All Manufacturing' ? 'selected' : ''}} class="opt-indent">All Manufacturing</option>
                                <option value="Maintenance" {{ $user->interest == 'Maintenance' ? 'selected' : ''}} class="opt-indent">Maintenance</option>
                                <option value="Manufacturing" {{ $user->interest == 'Manufacturing' ? 'selected' : ''}} class="opt-indent">Manufacturing</option>
                                <option value="Process Design & Control" {{ $user->interest == 'Process Design & Control' ? 'selected' : ''}} class="opt-indent">Process Design &amp; Control</option>
                                <option value="Purchasing/Material Mgmt" {{ $user->interest == 'Purchasing/Material Mgmt' ? 'selected' : ''}} class="opt-indent">Purchasing/Material Mgmt</option>
                                <option value="Quality Assurance" {{ $user->interest == 'Quality Assurance' ? 'selected' : ''}} class="opt-indent">Quality Assurance</option>
                            </optgroup>

                            <optgroup class="optgroup" label="Sales/Marketing">
                                <option value="All Sales/Marketing" {{ $user->interest == 'All Sales/Marketing' ? 'selected' : ''}} class="opt-indent">All Sales/Marketing</option>
                                <option value="Digital Marketing" {{ $user->interest == 'Digital Marketing' ? 'selected' : ''}} class="opt-indent">Digital Marketing</option>
                                <option value="Sales - Corporate" {{ $user->interest == 'Sales - Corporate' ? 'selected' : ''}} class="opt-indent">Sales - Corporate</option>
                                <option value="E-commerce" {{ $user->interest == 'E-commerce' ? 'selected' : ''}} class="opt-indent">E-commerce</option>
                                <option value="Marketing/Business Dev" {{ $user->interest == 'Marketing/Business Dev' ? 'selected' : ''}} class="opt-indent">Marketing/Business Dev</option>
                                <option value="Merchandising" {{ $user->interest == 'Merchandising' ? 'selected' : ''}} class="opt-indent">Merchandising</option>
                                <option value="Retail Sales" {{ $user->interest == 'Retail Sales' ? 'selected' : ''}} class="opt-indent">Retail Sales</option>
                                <option value="ales - Eng/Tech/IT" {{ $user->interest == 'ales - Eng/Tech/IT' ? 'selected' : ''}} class="opt-indent">Sales - Eng/Tech/IT</option>
                                <option value="Sales - Financial Services" {{ $user->interest == 'Sales - Financial Services' ? 'selected' : ''}} class="opt-indent">Sales - Financial Services</option>
                                <option value="Telesales/Telemarketing" {{ $user->interest == 'Telesales/Telemarketing' ? 'selected' : ''}} class="opt-indent">Telesales/Telemarketing</option>
                            </optgroup>

                            <optgroup class="optgroup" label="Sciences">
                                <option value="All Sciences" {{ $user->interest == 'All Sciences' ? 'selected' : ''}} class="opt-indent">All Sciences</option>
                                <option value="Actuarial/Statistics" {{ $user->interest == 'Actuarial/Statistics' ? 'selected' : ''}} class="opt-indent">Actuarial/Statistics</option>
                                <option value="Agriculture" {{ $user->interest == 'Agriculture' ? 'selected' : ''}} class="opt-indent">Agriculture</option>
                                <option value="Aviation" {{ $user->interest == 'Aviation' ? 'selected' : ''}} class="opt-indent">Aviation</option>
                                <option value="Biomedical" {{ $user->interest == 'Biomedical' ? 'selected' : ''}} class="opt-indent">Biomedical</option>
                                <option value="Biotechnology" {{ $user->interest == 'Biotechnology' ? 'selected' : ''}} class="opt-indent">Biotechnology</option>
                                <option value="Chemistry" {{ $user->interest == 'Chemistry' ? 'selected' : ''}} class="opt-indent">Chemistry</option>
                                <option value="Food Tech/Nutritionist" {{ $user->interest == 'Food Tech/Nutritionist' ? 'selected' : ''}} class="opt-indent">Food Tech/Nutritionist</option>
                                <option value="Geology/Geophysics" {{ $user->interest == 'Geology/Geophysics' ? 'selected' : ''}} class="opt-indent">Geology/Geophysics</option>
                                <option value="Science & Technology" {{ $user->interest == 'Science & Technology' ? 'selected' : ''}} class="opt-indent">Science &amp; Technology</option>
                            </optgroup>

                            <optgroup class="optgroup" label="Services">
                                <option value="All Services" {{ $user->interest == 'All Services' ? 'selected' : ''}} class="opt-indent">All Services</option>
                                <option value="Security/Armed Forces" {{ $user->interest == 'Security/Armed Forces' ? 'selected' : ''}} class="opt-indent">Security/Armed Forces</option>
                                <option value="Customer Service" {{ $user->interest == 'Customer Service' ? 'selected' : ''}} class="opt-indent">Customer Service</option>
                                <option value="Logistics/Supply Chain" {{ $user->interest == 'Logistics/Supply Chain' ? 'selected' : ''}} class="opt-indent">Logistics/Supply Chain</option>
                                <option value="Law/Legal Services" {{ $user->interest == 'Law/Legal Services' ? 'selected' : ''}} class="opt-indent">Law/Legal Services</option>
                                <option value="Personal Care" {{ $user->interest == 'Personal Care' ? 'selected' : ''}} class="opt-indent">Personal Care</option>
                                <option value="Social Services" {{ $user->interest == 'Social Services' ? 'selected' : ''}} class="opt-indent">Social Services</option>
                                <option value="Tech & Helpdesk Support" {{ $user->interest == 'Tech & Helpdesk Support' ? 'selected' : ''}} class="opt-indent">Tech &amp; Helpdesk Support</option>
                            </optgroup>

                            <optgroup class="optgroup" label="Others">
                                <option value="All Others" {{ $user->interest == 'All Others' ? 'selected' : ''}} class="opt-indent">All Others</option>
                                <option value="General Work" {{ $user->interest == 'General Work' ? 'selected' : ''}} class="opt-indent">General Work</option>
                                <option value="Journalist/Editors" {{ $user->interest == 'Journalist/Editors' ? 'selected' : ''}} class="opt-indent">Journalist/Editors</option>
                                <option value="Publishing" {{ $user->interest == 'Publishing' ? 'selected' : ''}} class="opt-indent">Publishing</option>
                                <option value="Encoder" {{ $user->interest == 'Encoder' ? 'selected' : ''}} class="opt-indent">Encoder</option>
                                <option value="None" {{ $user->interest == 'None' ? 'selected' : ''}} class="opt-indent">None</option>
                                <option value="Others" {{ $user->interest == 'Others' ? 'selected' : ''}} class="opt-indent">Others</option>
                            </optgroup>
                        </select>
                         @error('interest')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror  
                    </div>
                </div>

                <div class="form_lst">
                    <label>Tell something about yourself</label>
                    <div id="locDiv" class="rltv">
                        <textarea id="description" maxlength="500" placeholder="Mention in brief about your work experience, skills, achievements, awards, projects and goals"  class="form-control valid @error('description') is-invalid @enderror" name="description" value="{{ $user->description}}" >{{ $user->description}}</textarea>      
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror 
                    </div>
                </div>

                            <div class="form_lst sssss">
                                <label class="blank_label">&nbsp;</label>
                                <span class="rltv">
                                    <div class="pro_row_left">
                                        <input class="input_btn" id="saveCreateButton" type="submit" value="Update"/>
                                            <a href="{{route ('myprofile')}}" class="input_btn rigjt" rel="nofollow">Cancel</a>
                                    </div> 
                                </span>
                            </div>
                            </form> 
                        </div>        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection