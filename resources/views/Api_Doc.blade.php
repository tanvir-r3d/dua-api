 <!DOCTYPE html>
 <html class="no-js" lang="en">

 <head>
     <meta charset="utf-8">
     <title>Dua API - Documentation</title>
     <meta name="description" content="">
     <meta name="author" content="ticlekiwi">

     <meta http-equiv="cleartype" content="on">
     <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

     <link rel="stylesheet" href="css/hightlightjs-dark.css">
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.8.0/highlight.min.js"></script>
     <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,500|Source+Code+Pro:300" rel="stylesheet">
     <link rel="stylesheet" href="/assets/css/ApiCss.css" media="all">
     <script>
         hljs.initHighlightingOnLoad();
     </script>
 </head>

 <body class="one-content-column-version">
 <div class="content-page">
     <div class="content">
         <div class="overflow-hidden content-section" id="content-get-started">
             <h1 id="get-started">Get started</h1>
             <p>
                 This Project is only made for sharing duas to people. Make people more aware about Islam. May Allah Subhanahu wa ta'ala keep us safe and honest.
             </p>
             <p>
                 To use this API, you need to follow given urls. Please contact us at <a href="mailto:tanvirhossen112@gmail.com">tanvirhossen112@gmail.com</a> if you face any problem.
             </p>
         </div>
         <div class="overflow-hidden content-section" id="content-get-characters">
             <h2 id="get-categories">get categories</h2>
             <p>
                 To get categories data you need to make a GET call to the following url :<br>
                 <code class="higlighted">{{url()->current()}}/category</code>
             </p>
             <br>
             <h4>QUERY PARAMETERS</h4>
             <table>
                 <thead>
                 <tr>
                     <th>Field</th>
                     <th>Type</th>
                     <th>Description</th>
                 </tr>
                 </thead>
                 <tbody>
                    <tr>
                        <td>search</td>
                        <td>String</td>
                        <td>(optional) Search by name of categories.
                            <br> {{url()->current()}}/category?search=Hadis
                        </td>
                    </tr>
                    <tr>
                        <td>col</td>
                        <td>String</td>
                        <td>(optional) Column name for ordering. Default column is category name
                            <br> {{url()->current()}}/category?col=id
                            <br> {{url()->current()}}/category?col=name
                        </td>
                    </tr>
                    <tr>
                        <td>order</td>
                        <td>String</td>
                        <td>(optional) Column Ordering Ascending or Descending. Default order state  is category name asc
                        <br> {{url()->current()}}/category?col=id&order=desc
                        <br> {{url()->current()}}/category?col=name&order=asc
                        </td>
                    </tr>
                    <tr>
                        <td>limit</td>
                        <td>Number</td>
                        <td>(optional) Limit category fetch
                        <br> {{url()->current()}}/category?limit=10
                        </td>
                    </tr>
                    <tr>
                        <td>status</td>
                        <td>Number</td>
                        <td>(optional) Status wise category(1="active", 0="inactive")
                        <br> {{url()->current()}}/category?status=1
                        <br> {{url()->current()}}/category?status=0
                        </td>
                    </tr>
                 </tbody>
             </table>
         </div>
         <div class="overflow-hidden content-section" id="content-get-characters">
            <h2 id="category-details">Category details</h2>
            <p>
                To get category details you need to make a GET call to the following url :<br>
                <code class="higlighted">{{url()->current()}}/category/(id|slug)</code>
            </p>
            <br>
            <h4>QUERY PARAMETERS</h4>
            <table>
                <thead>
                <tr>
                    <th>Field</th>
                    <th>Type</th>
                    <th>Description</th>
                </tr>
                </thead>
                <tbody>
                   <tr>
                       <td>id</td>
                       <td>Number</td>
                       <td>Get category details by category id.
                           <br> {{url()->current()}}/category/6
                           <br> {{url()->current()}}/category/7
                       </td>
                   </tr>
                   <tr>
                    <td>slug</td>
                    <td>String</td>
                    <td>Get category details by category slug.
                        <br> {{url()->current()}}/category/hadis
                        <br> {{url()->current()}}/category/al-quran
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="overflow-hidden content-section" id="content-get-characters">
            <h2 id="get-duas">get duas</h2>
            <p>
                To get duas data you need to make a GET call to the following url :<br>
                <code class="higlighted">{{url()->current()}}/dua</code>
            </p>
            <br>
            <h4>QUERY PARAMETERS</h4>
            <table>
                <thead>
                <tr>
                    <th>Field</th>
                    <th>Type</th>
                    <th>Description</th>
                </tr>
                </thead>
                <tbody>
                   <tr>
                       <td>search</td>
                       <td>String</td>
                       <td>(optional) Search by title, details, category name, reference of duas.
                           <br> {{url()->current()}}/dua?search=Hadis
                           <br> {{url()->current()}}/dua?search=kindness
                       </td>
                   </tr>
                   <tr>
                       <td>col</td>
                       <td>String</td>
                       <td>(optional) Column name for ordering. Default column is dua title
                           <br> {{url()->current()}}/dua?col=id
                           <br> {{url()->current()}}/dua?col=title
                       </td>
                   </tr>
                   <tr>
                       <td>order</td>
                       <td>String</td>
                       <td>(optional) Column Ordering Ascending or Descending. Default order state  is dua name asc
                       <br> {{url()->current()}}/dua?col=id&order=desc
                       <br> {{url()->current()}}/dua?col=title&order=asc
                       </td>
                   </tr>
                   <tr>
                       <td>limit</td>
                       <td>Number</td>
                       <td>(optional) Limit dua fetch
                       <br> {{url()->current()}}/dua?limit=10
                       </td>
                   </tr>
                   <tr>
                       <td>status</td>
                       <td>Number</td>
                       <td>(optional) Status wise dua(1="active", 0="inactive")
                       <br> {{url()->current()}}/dua?status=1
                       <br> {{url()->current()}}/dua?status=0
                       </td>
                   </tr>
                </tbody>
            </table>
        </div>
        <div class="overflow-hidden content-section" id="content-get-characters">
           <h2 id="dua-details">Dua Details</h2>
           <p>
               To get dua details you need to make a GET call to the following url :<br>
               <code class="higlighted">{{url()->current()}}/dua/(id|slug)</code>
           </p>
           <br>
           <h4>QUERY PARAMETERS</h4>
           <table>
               <thead>
               <tr>
                   <th>Field</th>
                   <th>Type</th>
                   <th>Description</th>
               </tr>
               </thead>
               <tbody>
                  <tr>
                      <td>id</td>
                      <td>Number</td>
                      <td>Get category details by dua id.
                          <br> {{url()->current()}}/dua/3
                          <br> {{url()->current()}}/dua/4
                      </td>
                  </tr>
                  <tr>
                   <td>slug</td>
                   <td>String</td>
                   <td>Get dua details by dua slug.
                       <br> {{url()->current()}}/dua/ya-rabbi
                       <br> {{url()->current()}}/dua/forgive-us
                   </td>
               </tr>
               </tbody>
           </table>
       </div>
     </div>
 </div>
 <a href="https://github.com/ticlekiwi/API-Documentation-HTML-Template" class="github-corner" aria-label="View source on Github" title="View source on Github"><svg width="80" height="80" viewBox="0 0 250 250" style="z-index:99999; fill:#70B7FD; color:#fff; position: fixed; top: 0; border: 0; right: 0;" aria-hidden="true"><path d="M0,0 L115,115 L130,115 L142,142 L250,250 L250,0 Z"></path><path d="M128.3,109.0 C113.8,99.7 119.0,89.6 119.0,89.6 C122.0,82.7 120.5,78.6 120.5,78.6 C119.2,72.0 123.4,76.3 123.4,76.3 C127.3,80.9 125.5,87.3 125.5,87.3 C122.9,97.6 130.6,101.9 134.4,103.2" fill="currentColor" style="transform-origin: 130px 106px;" class="octo-arm"></path><path d="M115.0,115.0 C114.9,115.1 118.7,116.5 119.8,115.4 L133.7,101.6 C136.9,99.2 139.9,98.4 142.2,98.6 C133.8,88.0 127.5,74.4 143.8,58.0 C148.5,53.4 154.0,51.2 159.7,51.0 C160.3,49.4 163.2,43.6 171.4,40.1 C171.4,40.1 176.1,42.5 178.8,56.2 C183.1,58.6 187.2,61.8 190.9,65.4 C194.5,69.0 197.7,73.2 200.1,77.6 C213.8,80.2 216.3,84.9 216.3,84.9 C212.7,93.1 206.9,96.0 205.4,96.6 C205.1,102.4 203.0,107.8 198.3,112.5 C181.9,128.9 168.3,122.5 157.7,114.1 C157.9,116.9 156.7,120.9 152.7,124.9 L141.0,136.5 C139.8,137.7 141.6,141.9 141.8,141.8 Z" fill="currentColor" class="octo-body"></path></svg></a>
 <style>
     .github-corner:hover .octo-arm {
         animation: octocat-wave 560ms ease-in-out
     }

     @keyframes octocat-wave {
         0%,
         100% {
             transform: rotate(0)
         }
         20%,
         60% {
             transform: rotate(-25deg)
         }
         40%,
         80% {
             transform: rotate(10deg)
         }
     }

     @media (max-width:500px) {
         .github-corner:hover .octo-arm {
             animation: none
         }
         .github-corner .octo-arm {
             animation: octocat-wave 560ms ease-in-out
         }
     }
 </style>
 <script src="/assets/js/ApiJs.js"></script>
 </body>

 </html>
