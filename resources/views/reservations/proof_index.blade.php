<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

   <title>Baron & Cabot </title>
</head>
<style>
    /* ===== Google Font Import - Poppins ===== */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600&display=swap');
*{
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}
body{
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(210, 215, 211,1);
    background-repeat: no-repeat;
    background-size: cover;
   }
.container{
    position: relative;
    max-width: 900px;
    width: 100%;
    border-radius: 6px;
    padding: 30px;
    margin: 0 15px;
    background-color: #fff;
    box-shadow: 0 5px 10px rgba(0,0,0,0.1);
}
.container header{
    position: relative;
    font-size: 20px;
    font-weight: 600;
    color: #333;
}
.container header::before{
    content: "";
    position: absolute;
    left: 0;
    bottom: -2px;
    height: 3px;
    width: 27px;
    border-radius: 8px;
    background-color: #002478;
}
.container form{
    position: relative;
    margin-top: 16px;
    min-height: 490px;
    background-color: #fff;
    overflow: hidden;
}
.container form .form{
    position: absolute;
    background-color: #fff;
    transition: 0.3s ease;
}
.container form .form.second{
    opacity: 0;
    pointer-events: none;
    transform: translateX(100%);
}
form.secActive .form.second{
    opacity: 1;
    pointer-events: auto;
    transform: translateX(0);
}
form.secActive .form.first{
    opacity: 0;
    pointer-events: none;
    transform: translateX(-100%);
}
.container form .title{
    display: block;
    margin-bottom: 8px;
    font-size: 16px;
    font-weight: 500;
    margin: 6px 0;
    color: #333;
}
.container form .fields{
    display: flex;
    align-items: center;
    justify-content: space-between;
    flex-wrap: wrap;
}
form .fields .input-field{
    display: flex;
    width: calc(100% / 3 - 15px);
    flex-direction: column;
    margin: 4px 0;
}
.input-field label{
    font-size: 12px;
    font-weight: 500;
    color: #2e2e2e;
}

.input-field input, select{
    outline: none;
    font-size: 14px;
    font-weight: 400;
    color: #333;
    border-radius: 5px;
    border: 1px solid #aaa;
    padding: 0 15px;
    height: 42px;
    margin: 8px 0;
}
.input-field input :focus,
.input-field select:focus{
    box-shadow: 0 3px 6px rgba(0,0,0,0.13);
}
.input-field select,
.input-field input[type="date"]{
    color: #707070;
}
.input-field input[type="date"]:valid{
    color: #333;
}


.container form button, .backBtn{
    display: flex;
    align-items: center;
    justify-content: center;
    height: 45px;
    max-width: 200px;
    width: 100%;
    border: none;
    outline: none;
    color: #fff;
    border-radius: 5px;
    margin: 25px 0;
    background-color: #002478;
    transition: all 0.3s linear;
    cursor: pointer;
}
.container form .btnText{
    font-size: 14px;
    font-weight: 400;
}
form button:hover{
    background-color: #002478;
}
form button i,
form .backBtn i{
    margin: 0 6px;
}
form .backBtn i{
    transform: rotate(180deg);
}
form .buttons{
    display: flex;
    align-items: center;
}
form .buttons button , .backBtn{
    margin-right: 14px;
}
.shape {
  display: inline-block;
  background-color: lightgray;
  border-radius: 5px;
  padding: 10px;
  font-family: Arial, sans-serif;
  font-size: 16px;
  color: gray;
}

.placeholder {
  position: absolute;
  top: 50%;
  left: 10px;
  transform: translateY(-50%);
  color: lightgray;
}

@media (max-width: 750px) {
    .container form{
        overflow-y: scroll;
    }
    .container form::-webkit-scrollbar{
       display: none;
    }
    form .fields .input-field{
        width: calc(100% / 2 - 15px);
    }
}

@media (max-width: 550px) {
    form .fields .input-field{
        width: 100%;
    }
}
.form-step-hidden {
   display: none;
}
</style>
<body>
    <div class="container">
        <header>Proof Of Payment</header>
        <form action="#">
         <div class="form-step first">
           <div class="details personal">
             <span class="title">Development Details</span>

             <div class="fields">
               <div class="input-field">
                 <label>NAME OF THE DEVELOPMENT</label>
                 <div class="shape">
                   {!! $property->title !!}
                 </div>
               </div>

               <div class="input-field">
                 <label>ADDRESS OF THE DEVELOPMENT</label>
                 <div class="shape">
                   {!! $property->location  !!}
                 </div>
               </div>

               <div class="input-field">
                 <label>AGENT NAME & EMAIL</label>
                 <div class="shape">
                   {!! $business->name !!}
                 </div>
               </div>

               <div class="input-field">
                 <label>PAYMENT PLAN</label>
                 <div class="shape">
                   {!! $property -> payment_plan !!}
                 </div>
               </div>
             </div>
           </div>

           <div class="details ID">
             <span class="title">Buyer 1 Details</span>

             <div class="fields">
               <div class="input-field">
                 <label>TITLE</label>
                 <div class="shape">
                   {!! $reservation->buyer_title !!}
                 </div>
               </div>
               <div class="input-field">
                 <label>GENDER</label>
                 <div class="shape">
                   {!! $reservation->buyer_gender !!}
                 </div>
               </div>
               <div class="input-field">
                 <label>FULL NAMES</label>
                 <div class="shape">
                   {!! $reservation->buyer_name !!}
                 </div>
               </div>
               <div class="input-field">
                 <label>ADDRESS</label>
                 <div class="shape">
                   {!! $reservation->buyer_address !!}
                 </div>
               </div>
               <div class="input-field">
                 <label>CITY</label>
                 <div class="shape">
                   {!! $reservation->buyer_city !!}
                 </div>
               </div>
               <div class="input-field">
                 <label>COUNTRY</label>
                 <div class="shape">
                   {!! $reservation->buyer_country !!}
                 </div>
               </div>
               <div class="input-field">
                 <label>ZIP / POSTAL CODE</label>
                 <div class="shape">
                   {!! $reservation->buyer_zip_code !!}
                 </div>
               </div>
               <div class="input-field">
                 <label>TELEPHONE</label>
                 <div class="shape">
                   {!! $reservation->buyer_telephone !!}
                 </div>
               </div>
               <div class="input-field">
                 <label>EMAIL ADDRESS</label>
                 <div class="shape">
                   {!! $reservation->buyer_email !!}
                 </div>
               </div>
             </div>

             <button class="nextBtn">
               <span class="btnText">Next</span>
               <i class="uil uil-navigator"></i>
             </button>
           </div>
         </div>

         <div class="form-step form-step-hidden second">
           <div class="details ID">
             <span class="title">Buyer 2 Details</span>

             <div class="fields">
               <div class="input-field">
                 <label>TITLE</label>
                 <div class="shape">
                   {!! $reservation->buyer_2_title !!}
                 </div>
               </div>
               <div class="input-field">
                 <label>GENDER</label>
                 <div class="shape">
                   {!! $reservation->buyer_2_gender !!}
                 </div>
               </div>
               <div class="input-field">
                 <label>FULL NAMES</label>
                 <div class="shape">
                   {!! $reservation->buyer_2_name !!}
                 </div>
               </div>
               <div class="input-field">
                 <label>ADDRESS</label>
                 <div class="shape">
                   {!! $reservation->buyer_2_address !!}
                 </div>
               </div>
               <div class="input-field">
                 <label>CITY</label>
                 <div class="shape">
                   {!! $reservation->buyer_2_city !!}
                 </div>
               </div>
               <div class="input-field">
                 <label>COUNTRY</label>
                 <div class="shape">
                   {!! $reservation->buyer_2_country !!}
                 </div>
               </div>
               <div class="input-field">
                 <label>ZIP / POSTAL CODE</label>
                 <div class="shape">
                   {!! $reservation->buyer_2_zip_code !!}
                 </div>
               </div>
               <div class="input-field">
                 <label>TELEPHONE</label>
                 <div class="shape">
                   {!! $reservation->buyer_2_telephone !!}
                 </div>
               </div>
               <div class="input-field">
                 <label>EMAIL ADDRESS</label>
                 <div class="shape">
                   {!! $reservation->buyer_2_email !!}
                 </div>
               </div>
             </div>
             <div class="details personal">
               <span class="title">Contract Details</span>
               <div class="fields">
                 <div class="input-field">
                   <label>NAME TO APPEAR ON CONTRACTS</label>
                   <div class="shape">
                     {!! $reservation->contract_name !!}
                   </div>
                 </div>

                 <div class="input-field">
                   <label>BUYING VIA LTD COMPANY</label>
                   <div class="shape">
                     {!! $reservation->company_buy !!}
                   </div>
                 </div>
               </div>
             </div>
             <div class="details ID">
               <span class="title">PLOT AND RESERVATION DETAILS</span>

               <div class="fields">
                 <div class="input-field">
                   <label>PLOT NO</label>
                   <div class="shape">
                     {!! $property->plot !!}
                   </div>
                 </div>
                 <div class="input-field">
                   <label>UNIT NO</label>
                   <div class="shape">
                     {!! $property->plot !!}
                   </div>
                 </div>
                 <div class="input-field">
                   <label>FLOOR</label>
                   <div class="shape">
                     {!! $property->floor !!}
                   </div>
                 </div>
               </div>
               <div class="buttons">
                 <div class="backBtn">
                   <i class="uil uil-navigator"></i>
                   <span class="btnText">Back</span>
                 </div>

                 <button class="nextBtn">
                   <span class="btnText">Next</span>
                   <i class="uil uil-navigator"></i>
                 </button>
               </div>
             </div>
           </div>
         </div>
         <div class="form-step form-step-hidden third">
           <div class="details ID">
             <span class="title">PLOT AND RESERVATION DETAILS</span>
             <div class="fields">
               <div class="input-field">
                 <label>EST. SERVICE CHARGE</label>
                 <div class="shape">
                  {!! $property->estimated_service_charge !!}
                 </div>
               </div>
               <div class="input-field">
                 <label>NB BED</label>
                 <div class="shape">
                  {!! $property->bedrooms !!}
                 </div>
               </div>
               <div class="input-field">
                 <label>GIA</label>
                 <div class="shape">
                  {!! $unit->title !!}
                 </div>
               </div>
               <div class="input-field">
                 <label>EST. GROUND RENT</label>
                 <div class="shape">
                  £{!! number_format($property->ground_rent) !!}
                 </div>
               </div>
               <div class="input-field">
                 <label>UNIT PRICE</label>
                 <div class="shape">
                  £{!! number_format($unit->price) !!}
                 </div>
               </div>
               <div class="input-field">
                 <label>PARKING PLOT</label>
                 <div class="shape">
                  {!! $unit->title !!}
                 </div>
               </div>
               <div class="input-field">
                 <label>TOTAL PURCHASE PRICE</label>
                 <div class="shape">
                  £{!! number_format($unit->price) !!}
                 </div>
               </div>
               <div class="input-field">
                 <label>PURCHASE TYPE</label>
                 <div class="shape">
                  {!! $reservation->purchase_type !!}
                 </div>
               </div>
             </div>
             <div class="details personal">
               <span class="title">FINANCING DETAILS</span>
               <div class="fields">
                 <div class="input-field">
                   <label>FINANCING TYPE</label>
                   <div class="shape">
                     {!! $reservation->financing_type !!}
                   </div>
                 </div>
                 <div class="input-field">
                   <label>FINANCING REFERAL</label>
                   <div class="shape">
                     {{-- {!! $property->location  !!} --}}
                   </div>
                 </div>
                 <div class="input-field">
                   <label>EMAIL</label>
                   <div class="shape">
                     {!! $reservation->mortgage_email!!}
                   </div>
                 </div>
               </div>
               <div class="details personal">
                 <span class="title">MORTGAGE PROVIDER DETAILS</span>
                 <div class="fields">
                   <div class="input-field">
                     <label>COMPANY NAME</label>
                     <div class="shape">
                        {!! $reservation->mortgage_company_name !!}
                     </div>
                   </div>
                   <div class="input-field">
                     <label>CONTACT NAME</label>
                     <div class="shape">
                        {!! $reservation->mortgage_contact_name!!}
                     </div>
                   </div>
                   <div class="input-field">
                     <label>TELEPHONE</label>
                     <div class="shape">
                        {!! $reservation->mortgage_telephone !!}
                     </div>
                   </div>

                 </div>
                 <div class="buttons">
                   <div class="backBtn">
                     <i class="uil uil-navigator"></i>
                     <span class="btnText">Back</span>
                   </div>

                   <button class="nextBtn">
                     <span class="btnText">Next</span>
                     <i class="uil uil-navigator"></i>
                   </button>
                 </div>
               </div>
             </div>
           </div>
         </div>

         <div class="form-step form-step-hidden fourth">
           <div class="details ID">
             <span class="title">LETTINGS & MANAGEMENT AND FURNITURE PACKS</span>
             <div class="fields">
               <div class="input-field">
                 <label>FURNITURE PACK</label>
                 <div class="shape">
                   {!! $property->furniture_pack !!}
                 </div>
               </div>
               <div class="input-field">
                 <label>LETTINGS REFERAL</label>
                 <div class="shape">
                   {{-- {!! $reservation->buyer_city !!} --}}
                 </div>
               </div>
             </div>
             <div class="details personal">
               <span class="title">CONVEYANCING DETAILS</span>
               <div class="fields">
                 <div class="input-field">
                   <label>I UNDERSTAND THIS IS AN INVESTMENT INTO PROPERTY AND I AM
                     FREE TO APPOINT ANY SOLICITOR TO CONDUCT THE PURCHASE
                   ON MY BEHALF. I WISH TO APPOINT THE FOLLOWING</label>
                 </div>
                 <div class="input-field">
                   <label>RECOMMENDED BUYER SOLICITORS</label>
                   <div class="shape">
                     BLAKEWELLS SOLICITORS
                     MEHFOOZ KHANKHARA<br>
                     E: MK@BLAKEWELLS.CO.UK<br>
                     T: +44(0)208 522 4400
                   </div>
                 </div>
                 <div class="input-field">
                   <label>MY OWN SOLICITOR</label>
                   <div class="shape">
                     SOLICITOR:{!! $reservation->solicitor !!}<br>
                     POINT OF CONTACT:{!! $reservation->solicitor_contacts !!}<br>
                     EMAIL:{!! $reservation->solicitor_email !!}<br>
                     TELEPHONE:{!! $reservation->solicitor_telephone !!}<br>
                   </div>
                 </div>
               </div>
               <div class="details personal">
                 <span class="title">MORTGAGE PROVIDER DETAILS</span>
                 <div class="fields">
                   <div class="input-field">
                     <label>COMPANY NAME</label>
                     <div class="shape">
                        {!! $reservation->mortgage_company_name !!}
                     </div>
                   </div>
                   <div class="input-field">
                     <label>CONTACT NAME</label>
                     <div class="shape">
                        {!! $reservation->mortgage_contact_name !!}
                     </div>
                   </div>
                   <div class="input-field">
                     <label>TELEPHONE</label>
                     <div class="shape">
                        {!! $reservation->mortgage_telephone !!}
                     </div>
                   </div>

                 </div>
                 <div class="buttons">
                   <div class="backBtn">
                     <i class="uil uil-navigator"></i>
                     <span class="btnText">Back</span>
                   </div>

                   <button class="nextBtn">
                     <span class="btnText">Next</span>
                     <i class="uil uil-navigator"></i>
                   </button>
                 </div>
               </div>
             </div>
           </div>
         </div>
         <div class="form-step form-step-hidden fifth">
            <div class="details ID">
              <span class="title">PROPERTY RESERVATION PROCESS</span>
              <div class="fields">
                <div class="input-field">
                  <label>KYC/AML REQUIRED DOCUMENTATION</label>
                  <div class="shape">
                     YOUR RESERVATION FORM MUST INCLUDE THE FOLLOWING DOCUMENTS. PLEASE NOTE THAT CERTIFIED COPIES ARE REQUIRED IF YOU
                     DO NOT RESIDE IN THE UNITED KINGDOM. UK ISSUED DRIVING LICENSES MAY NOT BE USED AS PROOF OF ADDRESS.
                  </div>
                </div>
                <div class="input-field">
                  <label>PURCHASE AS AN INDIVIDUAL</label>
                  <div class="shape">
                     YOUR RESERVATION FORM MUST INCLUDE THE FOLLOWING DOCUMENTS. PLEASE NOTE THAT CERTIFIED COPIES ARE REQUIRED IF YOU
                     DO NOT RESIDE IN THE UNITED KINGDOM. UK ISSUED DRIVING LICENSES MAY NOT BE USED AS PROOF OF ADDRESS.
                  </div>
                </div>
                <div class="input-field">
                  <label>PURCHASE AS A COMPANY</label>
                  <div class="shape">
                     YOUR RESERVATION FORM MUST INCLUDE THE FOLLOWING DOCUMENTS. PLEASE NOTE THAT CERTIFIED COPIES ARE REQUIRED IF YOU
                     DO NOT RESIDE IN THE UNITED KINGDOM. UK ISSUED DRIVING LICENSES MAY NOT BE USED AS PROOF OF ADDRESS.
                  </div>
                </div>
               </div>
               <span class="title">PURCHASED AS AN INDIVIDUAL</span>
               <div class="fields">
                  {{-- <div class="input-field"></div> --}}
                     <label>UPLOAD PASSPORT OR ID COPY</label>
                     <input type="file" placeholder="Enter your name" required />
                    </div>
                    <div class="fields">
                     <label>UPLOAD RECENT PROOF OF ADDRESS</label>
                     <input type="file" placeholder="Enter proof of address" required>
                    </div>
               {{-- </div> --}}
                  <div class="buttons">
                    <div class="backBtn">
                      <i class="uil uil-navigator"></i>
                      <span class="btnText">Back</span>
                    </div>

                    <button class="nextBtn">
                      <span class="btnText">Next</span>
                      <i class="uil uil-navigator"></i>
                    </button>
                  </div>
                </div>
              </div>
            </div>
         </div>
         {{-- <div class="form-step form-step-hidden sixth">
              <div class="details personal">
                <span class="title">Devel</span>

                <div class="fields">
                  <div class="input-field">
                    <label>NAME OF THE DEVELOPMENT</label>
                    <div class="shape">
                      {!! $property->title !!}
                    </div>
                  </div>

                  <div class="input-field">
                    <label>ADDRESS OF THE DEVELOPMENT</label>
                    <div class="shape">
                      {!! $property->location  !!}
                    </div>
                  </div>

                  <div class="input-field">
                    <label>AGENT NAME & EMAIL</label>
                    <div class="shape">
                      {!! $business->name !!}
                    </div>
                  </div>

                  <div class="input-field">
                    <label>PAYMENT PLAN</label>
                    <div class="shape">
                      {!! $property -> payment_plan !!}
                    </div>
                  </div>
                </div>
              </div>

              <div class="details ID">
                <span class="title">Buyer 1 Details</span>

                <div class="fields">
                  <div class="input-field">
                    <label>TITLE</label>
                    <div class="shape">
                      {!! $reservation->buyer_title !!}
                    </div>
                  </div>
                  <div class="input-field">
                    <label>GENDER</label>
                    <div class="shape">
                      {!! $reservation->buyer_gender !!}
                    </div>
                  </div>
                  <div class="input-field">
                    <label>FULL NAMES</label>
                    <div class="shape">
                      {!! $reservation->buyer_name !!}
                    </div>
                  </div>
                  <div class="input-field">
                    <label>ADDRESS</label>
                    <div class="shape">
                      {!! $reservation->buyer_address !!}
                    </div>
                  </div>
                  <div class="input-field">
                    <label>CITY</label>
                    <div class="shape">
                      {!! $reservation->buyer_city !!}
                    </div>
                  </div>
                  <div class="input-field">
                    <label>COUNTRY</label>
                    <div class="shape">
                      {!! $reservation->buyer_country !!}
                    </div>
                  </div>
                  <div class="input-field">
                    <label>ZIP / POSTAL CODE</label>
                    <div class="shape">
                      {!! $reservation->buyer_zip_code !!}
                    </div>
                  </div>
                  <div class="input-field">
                    <label>TELEPHONE</label>
                    <div class="shape">
                      {!! $reservation->buyer_telephone !!}
                    </div>
                  </div>
                  <div class="input-field">
                    <label>EMAIL ADDRESS</label>
                    <div class="shape">
                      {!! $reservation->buyer_email !!}
                    </div>
                  </div>
                </div>

                <button class="nextBtn">
                  <span class="btnText">Next</span>
                  <i class="uil uil-navigator"></i>
                </button>
              </div>
         </div> --}}

         {{-- <div class="form-step form-step-hidden fifth">
          <div class="details ID">
            <span class="title">PROPERTY RESERVATION PROCESS</span>
            <div class="fields">
              <div class="input-field">
                <label>KYC/AML REQUIRED DOCUMENTATION</label>
                <div class="shape">
                   YOUR RESERVATION FORM MUST INCLUDE THE FOLLOWING DOCUMENTS. PLEASE NOTE THAT CERTIFIED COPIES ARE REQUIRED IF YOU
                   DO NOT RESIDE IN THE UNITED KINGDOM. UK ISSUED DRIVING LICENSES MAY NOT BE USED AS PROOF OF ADDRESS.
                </div>
              </div>
              <div class="input-field">
                <label>PURCHASE AS AN INDIVIDUAL</label>
                <div class="shape">
                   YOUR RESERVATION FORM MUST INCLUDE THE FOLLOWING DOCUMENTS. PLEASE NOTE THAT CERTIFIED COPIES ARE REQUIRED IF YOU
                   DO NOT RESIDE IN THE UNITED KINGDOM. UK ISSUED DRIVING LICENSES MAY NOT BE USED AS PROOF OF ADDRESS.
                </div>
              </div>
              <div class="input-field">
                <label>PURCHASE AS A COMPANY</label>
                <div class="shape">
                   YOUR RESERVATION FORM MUST INCLUDE THE FOLLOWING DOCUMENTS. PLEASE NOTE THAT CERTIFIED COPIES ARE REQUIRED IF YOU
                   DO NOT RESIDE IN THE UNITED KINGDOM. UK ISSUED DRIVING LICENSES MAY NOT BE USED AS PROOF OF ADDRESS.
                </div>
              </div>
             </div>
             <span class="title">PURCHASED AS AN INDIVIDUAL</span>
             <div class="fields">

                   <label>UPLOAD PASSPORT OR ID COPY</label>
                   <input type="file" placeholder="Enter your name" required />
                  </div>
                  <div class="fields">
                   <label>UPLOAD RECENT PROOF OF ADDRESS</label>
                   <input type="file" placeholder="Enter proof of address" required>
                  </div>

                <div class="buttons">
                  <div class="backBtn">
                    <i class="uil uil-navigator"></i>
                    <span class="btnText">Back</span>
                  </div>

                  <button class="nextBtn">
                    <span class="btnText">Next</span>
                    <i class="uil uil-navigator"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>
       </div> --}}

         </form>
    </div>
    <script>

      const steps = ["first","second","third","fourth","fifth","sixth"];
      let activeStep = 0;

      const form = document.querySelector("form"),
      nextBtns = form.querySelectorAll(".nextBtn"),
      backBtns = form.querySelectorAll(".backBtn");
      console.log(["5", activeStep, form, nextBtns, backBtns]);

      nextBtns.forEach((nextBtn) => {
         nextBtn.addEventListener("click", () => {
            if (activeStep != steps.length - 1) {
               form.querySelector("." + steps[activeStep]).classList.add("form-step-hidden");
               activeStep++;
               form.querySelector("." + steps[activeStep]).classList.remove("form-step-hidden");
            }
         });
      });

      backBtns.forEach((backBtn) => {
         backBtn.addEventListener("click", () => {
            if (activeStep != 0) {
               form.querySelector("." + steps[activeStep]).classList.add("form-step-hidden");
               activeStep--;
               form.querySelector("." + steps[activeStep]).classList.remove("form-step-hidden");
            }
         });
      });
    </script>
</body>
</html>
