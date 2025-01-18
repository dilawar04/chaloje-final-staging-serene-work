<?php

   //user details
   $name = $_POST['nameofapplicant'];
   $soDo = $_POST['s/o-d/o'];
   $cnic = $_POST['cnic'];
   $passportnumber = $_POST['passportnumber'];
   $dateofbirth = $_POST['dateofbirth'];
   $phoneoffice = $_POST['phoneoffice'];
   $phoneresidence = $_POST['phoneresidence'];
   $mobileno = $_POST['mobileno'];
   $email = $_POST['email'];
   $mailingAddress = $_POST['mailing-address'];
   $permanentAddress = $_POST['permanent-address'];

  // Plot details
  $plotSize = $_POST['Plotsize'];  
  $residentialUnit = $_POST['residentialUnit'];  
  $type = $_POST['type'];  
  $sector = $_POST['sector'];  
  $category = $_POST['category'];  
  $costofunit = $_POST['cost-of-unit'];  


//  sending email to user and admin
    mailToAdmin( $plotSize , $residentialUnit , $type , $sector , $category , $costofunit , $name, $soDo , $cnic , $passportnumber , $dateofbirth , $phoneoffice , $phoneresidence , $mobileno , $email , $mailingAddress , $permanentAddress);
    mailToUser($email , $plotSize , $residentialUnit , $type , $sector , $category , $costofunit); 




   function mailToUser($email , $plotSize , $residentialUnit , $type , $sector , $category , $costofunit ){
         $to = $email;
         $subject = "Booking - Gawadar"; 
         $headers  = 'MIME-Version: 1.0' . "\r\n";
         $headers = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
         $headers = 'From: Gawadar <noreply@bcg.com>' . "\r\n";
 
         $message="
         <html>
         <head>
         <title>Email</title>
         <style>
         body {
            width: 100% !important;
            height: 100%;
            margin: 0;
            line-height: 1.4;
            background-color: #f5f7f9;
            -webkit-text-size-adjust: none;
          }
    
          /* Layout ------------------------------ */
          .email-wrapper {
            width: 100%;
            margin: 0;
            padding: 0;
          }
    
          .email-content {
            width: 100%;
            margin: 0;
            padding: 0;
          }
    
          /* Masthead ----------------------- */
          .email-masthead {
            padding: 35px 0 0px 0;
            text-align: center;
          }
          .email-masthead_logo {
            max-width: 400px;
            border: 0;
          }
    
          /* Body ------------------------------ */
          .email-body {
            width: 100%;
            margin: 0;
            padding: 0;
          }
    
          .email-body_inner {
            width: 650px;
            margin: 0 auto;
            padding: 0;
            background: #ffffff;
            border: 1px solid #f1f1f1;
          }
          .email-footer {
            width: 650px;
            margin: 0 auto;
            padding: 0;
            text-align: center;
          }
    
          .body-action {
            width: 100%;
            margin: 20px auto;
            padding: 0;
            text-align: center;
          }
          .body-sub {
            margin-top: 25px;
            padding-top: 25px;
            border-top: 1px solid #e7eaec;
          }
          .content-cell {
            padding: 10px 25px;
          }
          .align-center {
            text-align: center;
          }
          .align-right {
            text-align: right;
          }
    
          p {
            margin-top: 0;
            color: #727677;
            font-size: 16px;
            line-height: 1.5em;
            text-align: left;
          }
    
          .help-desk-link {
            color: #292525;
            font-weight: 600;
          }
    
    
          .tableDataHead{
             font-size: 18px;
             padding:10px 0px 10px 60px;
             font-weight: 600;
          }
    
          .tableData{
             font-size: 18px;
             padding:10px 0px 10px 60px;
          }
    
          /*Media Queries ------------------------------ */
          @media only screen and (max-width: 600px) {
            .email-body_inner,
            .email-footer,
            .email-100 {
              width: 100% !important;
            }
          }
          @media only screen and (max-width: 500px) {
            .button {
              width: 100% !important;
            }
          }
         </style>
         </head>
         <body>
         <table class='email-wrapper' width='100%' cellpadding='0' cellspacing='0'>
           <tr>
             <td align='center'>
               <table
                 class='email-content'
                 width='100%'
                 cellpadding='0'
                 cellspacing='0'
               >
                 <!-- Email Body -->
                 <tr>
                   <td class='email-body' width='100%'>
                     <table
                       class='email-body_inner'
                       align='center'
                       width='650'
                       cellpadding='0'
                       cellspacing='0'
                     >
                       <!-- Body content -->
                       <tbody>
                         <tr>
                           <td
                             colspan='2'
                             style='
                               background: rgb(0, 0, 0, 0.5);
                               background: linear-gradient(60deg, rgba(252, 157, 3, 0.5) 5%, rgba(0, 0, 0, 1) 100%, rgba(252, 157, 3, 0.5) 5% );
                               height: 5px;
                             '
                           ></td>
                         </tr>
     
                         <tr>
                           <td colspan='2' class='email-masthead'>
                             <img src='images/logo.png' width='200' alt='ERX LOGO' />
                           </td>
                         </tr>
     
                         <!-- Body content -->
                         <tr>
                           <td colspan='2' class='content-cell' align='center'>
                             <h1
                               style='
                                 padding-bottom: 10px;
                                 display: block;
                                 text-align: center;
                                 font-size: 28px;
                                 color: #3b3535;
                                 font-weight: 800;
                               '
                             >
                               Thank You!
                             </h1>
     
                             <h3
                               style='
                                 display: block;
                                 text-align: center;
                                 font-size: 22px;
                                 color: #3b3535;
                                 font-weight: 800;
                               '
                             >
                               Here are your plot details.
                             </h3>
                           </td>
                         </tr>
     
                         <tr>
                          <td class='tableDataHead'>Plot No</td>
                          <td class='tableData'>".$plotSize."</td>
                         </tr>
     
                         <tr>
                          <td class='tableDataHead'>Residential Units</td>
                          <td class='tableData'>".$residentialUnit."</td>
                         </tr>
     
                         <tr>
                          <td class='tableDataHead'>Type</td>
                          <td class='tableData'>".$type."</td>
                         </tr>
     
                         <tr>
                          <td class='tableDataHead'>Sector</td>
                          <td class='tableData'>".$sector."</td>
                         </tr>
     
                         <tr>
                          <td class='tableDataHead' >Category</td>
                          <td class='tableData'>".$category."</td>
                         </tr>
     
                         <tr>
                          <td class='tableDataHead'>Cost Of Unit</td>
                          <td class='tableData'>".$costofunit."</td>
                         </tr>
                
                         <tr>
                           <td
                             colspan='2'
                             style='
                               background: rgb(0, 0, 0, 0.5);
                               background: linear-gradient( 60deg, rgba(252, 157, 3, 0.5) 5%, rgba(0, 0, 0, 1) 100%,rgba(252, 157, 3, 0.5) 5%);
                               height: 5px;
                             '
                           ></td>
                         </tr>
                       </tbody>
                     </table>
                   </td>
                 </tr>
               </table>
             </td>
           </tr>
         </table>
       </body>
    </html>
   ";

    mail($to, $subject, $message, $headers);

}

    function mailToAdmin( $plotSize , $residentialUnit , $type , $sector , $category , $costofunit , $name, $soDo , $cnic , $passportnumber , $dateofbirth , $phoneoffice , $phoneresidence , $mobileno , $email , $mailingAddress , $permanentAddress){
        $to = 'mufaddalali.5253@gmail.com';
        $subject = 'Booking - Gawadar'; 
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers = 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        $headers = 'From: Request a Demo - ERX <noreply@bcg.com>' . "\r\n";

        $message = "
        <html>
        <head>
        <title>Email</title>
        <style>
        body {
            width: 100% !important;
            height: 100%;
            margin: 0;
            line-height: 1.4;
            background-color: #f5f7f9;
            -webkit-text-size-adjust: none;
          }
    
          /* Layout ------------------------------ */
          .email-wrapper {
            width: 100%;
            margin: 0;
            padding: 0;
          }
    
          .email-content {
            width: 100%;
            margin: 0;
            padding: 0;
          }
    
          /* Masthead ----------------------- */
          .email-masthead {
            padding: 35px 0 0px 0;
            text-align: center;
          }
          .email-masthead_logo {
            max-width: 400px;
            border: 0;
          }
    
          /* Body ------------------------------ */
          .email-body {
            width: 100%;
            margin: 0;
            padding: 0;
          }
    
          .email-body_inner {
            width: 650px;
            margin: 0 auto;
            padding: 0;
            background: #ffffff;
            border: 1px solid #f1f1f1;
          }
          .email-footer {
            width: 650px;
            margin: 0 auto;
            padding: 0;
            text-align: center;
          }
    
          .body-action {
            width: 100%;
            margin: 20px auto;
            padding: 0;
            text-align: center;
          }
          .body-sub {
            margin-top: 25px;
            padding-top: 25px;
            border-top: 1px solid #e7eaec;
          }
          .content-cell {
            padding: 10px 25px;
          }
          .align-center {
            text-align: center;
          }
          .align-right {
            text-align: right;
          }
    
          p {
            margin-top: 0;
            color: #727677;
            font-size: 16px;
            line-height: 1.5em;
            text-align: left;
          }
    
          .help-desk-link {
            color: #292525;
            font-weight: 600;
          }
    
    
          .tableDataHead{
             font-size: 18px;
             padding:10px 0px 10px 60px;
             font-weight: 600;
          }
    
          .tableData{
             font-size: 18px;
             padding:10px 0px 10px 60px;
          }
    
          /*Media Queries ------------------------------ */
          @media only screen and (max-width: 600px) {
            .email-body_inner,
            .email-footer,
            .email-100 {
              width: 100% !important;
            }
          }
          @media only screen and (max-width: 500px) {
            .button {
              width: 100% !important;
            }
          }
        </style>
        </head>


        <body>
        <table class='email-wrapper' width='100%' cellpadding='0' cellspacing='0'>
          <tr>
            <td align='center'>
              <table
                class='email-content'
                width='100%'
                cellpadding='0'
                cellspacing='0'
              >
                <!-- Email Body -->
                <tr>
                  <td class='email-body'= width='100%'>
                    <table
                      class='email-body_inner'
                      align='center'
                      width='650'
                      cellpadding='0'
                      cellspacing='0'
                    >
                      <!-- Body content -->
                      <tbody>
                        <tr>
                          <td
                            colspan='2'
                            style='
                              background: rgb(0, 0, 0, 0.5);
                              background: linear-gradient(60deg, rgba(252, 157, 3, 0.5) 5%, rgba(0, 0, 0, 1) 100%, rgba(252, 157, 3, 0.5) 5% );
                              height: 5px;
                            '
                          ></td>
                        </tr>
    
                        <tr>
                          <td colspan='2' class='email-masthead'>
                            <img src='images/logo.png' width='200' alt='ERX LOGO' />
                          </td>
                        </tr>
    
                        <!-- Body content -->
                        <tr>
                          <td colspan='2' class='content-cell' align='center'>
                            <h3
                              style='
                                display: block;
                                text-align: center;
                                font-size: 22px;
                                color: #3b3535;
                                font-weight: 800;
                              '
                            >
                              Here are the user details
                            </h3>
                          </td>
                        </tr>
    
                        <tr>
                         <td class='tableDataHead'>Name of Applicant</td>
                         <td class='tableData'>".$name."</td>
                        </tr>
    
                        <tr>
                         <td class='tableDataHead'>S/O, D/O , W/O</td>
                         <td class='tableData'>".$soDo."</td>
                        </tr>
    
                        <tr>
                         <td class='tableDataHead'>CNIC</td>
                         <td class='tableData'>".$cnic."</td>
                        </tr>
    
                        <tr>
                         <td class='tableDataHead'>Passport Number</td>
                         <td class='tableData'>".$passportnumber."</td>
                        </tr>
    
                        <tr>
                         <td class='tableDataHead' >Date Of Birth</td>
                         <td class='tableData'>".$dateofbirth."</td>
                        </tr>
    
                        <tr>
                         <td class='tableDataHead'>Phone Office</td>
                         <td class='tableData'>".$phoneoffice."</td>
                        </tr>
    
                        <tr>
                         <td class='tableDataHead'>Residential Number</td>
                         <td class='tableData'>".$phoneresidence."</td>
                        </tr>
    
                        <tr>
                         <td class='tableDataHead'>Mobile Number</td>
                         <td class='tableData'>".$mobileno."</td>
                        </tr>
    
                        <tr>
                         <td class='tableDataHead'>Email</td>
                         <td class='tableData'>".$email."</td>
                        </tr>
    
                        <tr>
                         <td class='tableDataHead'>Mailing Address</td>
                         <td class='tableData'>".$mailingAddress."</td>
                        </tr>
    
                        <tr>
                         <td class='tableDataHead'>Permanent Address</td>
                         <td class='tableData'>".$permanentAddress."</td>
                        </tr>
    
    
                        <tr>
                          <td colspan='2' class='content-cell' align='center'>
                            <h3
                              style='
                                display: block;
                                text-align: center;
                                font-size: 22px;
                                color: #3b3535;
                                font-weight: 800;
                                margin-top: 100px;
                              '
                            >
                              Here are the plot details
                            </h3>
                          </td>
                        </tr>
    
                        <tr>
                          <td class='tableDataHead'>Plot No</td>
                          <td class='tableData'>".$plotSize."</td>
                         </tr>
     
                         <tr>
                          <td class='tableDataHead'>Residential Units</td>
                          <td class='tableData'>".$residentialUnit."</td>
                         </tr>
     
                         <tr>
                          <td class='tableDataHead'>Type</td>
                          <td class='tableData'>".$type."</td>
                         </tr>
     
                         <tr>
                          <td class='tableDataHead'>Sector</td>
                          <td class='tableData'>".$sector."</td>
                         </tr>
     
                         <tr>
                          <td class='tableDataHead' >Category</td>
                          <td class='tableData'>".$category."</td>
                         </tr>
     
                         <tr>
                          <td class='tableDataHead'>Cost Of Unit</td>
                          <td class='tableData'>".$costofunit."</td>
                         </tr>
    
                        <tr>
                          <td
                            colspan='2'
                            style='
                              background: rgb(0, 0, 0, 0.5);
                              background: linear-gradient( 60deg, rgba(252, 157, 3, 0.5) 5%, rgba(0, 0, 0, 1) 100%, rgba(252, 157, 3, 0.5) 5%);
                              height: 5px;
                            '
                          ></td>
                        </tr>
                      </tbody>
                    </table>
                  </td>
                </tr>
              </table>
            </td>
          </tr>
        </table>
      </body>
    </html>
    ";
     mail($to, $subject, $message, $headers);
}
   
?>


