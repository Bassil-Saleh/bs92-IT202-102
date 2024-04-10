<table><tr><td> <em>Assignment: </em> IT202 Milestone1 Deliverable</td></tr>
<tr><td> <em>Student: </em> Bassil Saleh (bs92)</td></tr>
<tr><td> <em>Generated: </em> 3/30/2024 2:58:32 PM</td></tr>
<tr><td> <em>Grading Link: </em> <a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-102-S2024/it202-milestone1-deliverable/grade/bs92" target="_blank">Grading</a></td></tr></table>
<table><tr><td> <em>Instructions: </em> <ol><li>Checkout Milestone1 branch</li><li>Create a milestone1.md file in your Project folder</li><li>Git add/commit/push this empty file to Milestone1 (you'll need the link later)</li><li>Fill in the deliverable items<ol><li>For each feature, add a direct link (or links) to the expected file the implements the feature from Heroku Prod (I.e,&nbsp;<a href="https://mt85-prod.herokuapp.com/Project/register.php">https://mt85-prod.herokuapp.com/Project/register.php</a>)</li></ol></li><li>Ensure your images display correctly in the sample markdown at the bottom</li><ol><li>NOTE: You may want to try to capture as much checklist evidence in your screenshots as possible, you do not need individual screenshots and are recommended to combine things when possible. Also, some screenshots may be reused if applicable.</li></ol><li>Save the submission items</li><li>Copy/paste the markdown from the "Copy markdown to clipboard link" or via the download button</li><li>Paste the code into the milestone1.md file or overwrite the file</li><li>Git add/commit/push the md file to Milestone1</li><li>Double check the images load when viewing the markdown file (points will be lost for invalid/non-loading images)</li><li>Make a pull request from Milestone1 to dev and merge it (resolve any conflicts)<ol><li>Make sure everything looks ok on heroku dev</li></ol></li><li>Make a pull request from dev to prod (resolve any conflicts)<ol><li>Make sure everything looks ok on heroku prod</li></ol></li><li>Submit the direct link from github prod branch to the milestone1.md file (no other links will be accepted and will result in 0)</li></ol></td></tr></table>
<table><tr><td> <em>Deliverable 1: </em> Feature: User will be able to register a new account </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add one or more screenshots of the application showing the form and validation errors per the feature requirements</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://i.imgur.com/P2P9nes.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Invalid email validation (before submitting form)<br></p>
</td></tr>
<tr><td><img width="768px" src="https://i.imgur.com/3U2eli3.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Invalid email validation (after submitting form)<br></p>
</td></tr>
<tr><td><img width="768px" src="https://i.imgur.com/7E5NROr.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Invalid password validation (before submitting form)<br></p>
</td></tr>
<tr><td><img width="768px" src="https://i.imgur.com/1toeKo1.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Invalid password validation (after submitting form)<br></p>
</td></tr>
<tr><td><img width="768px" src="https://i.imgur.com/xFqXIGw.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Non-matching password validation (before submitting form)<br></p>
</td></tr>
<tr><td><img width="768px" src="https://i.imgur.com/FmDXd4q.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Non-matching password validation (after submitting form)<br></p>
</td></tr>
<tr><td><img width="768px" src="https://i.imgur.com/7IhU7TW.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Email already exists (before submitting form)<br></p>
</td></tr>
<tr><td><img width="768px" src="https://i.imgur.com/9xmN95U.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Email already exists (after submitting form)<br></p>
</td></tr>
<tr><td><img width="768px" src="https://i.imgur.com/oLYnuw7.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Username already exists (before submitting form)<br></p>
</td></tr>
<tr><td><img width="768px" src="https://i.imgur.com/0yQh6W8.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Username already exists (after submitting form)<br></p>
</td></tr>
<tr><td><img width="768px" src="https://i.imgur.com/efSmZqv.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Form with valid data (before submitting)<br></p>
</td></tr>
<tr><td><img width="768px" src="https://i.imgur.com/LmS9rKI.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Form with valid data (after submitting)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot of the Users table with data in it</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://i.imgur.com/bSWGGhM.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of the row in the MySQL database after registering the user in<br>Task #1.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/Bassil-Saleh/bs92-IT202-102/pull/13">https://github.com/Bassil-Saleh/bs92-IT202-102/pull/13</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Explain briefly how the process/code works</td></tr>
<tr><td> <em>Response:</em> <div><b><u>Frontend validation logic:</u></b></div>When the user has finished filling out the HTML forms with<br>their account info and hits the "Register" button, the "required" HTML&nbsp;attribute (assigned to<br>the Email and Username forms) is used by the user's web browser to<br>check if the user entered anything in the email and username fields. In<br>other words, the frontend HTML code checks if the username and email fields<br>are filled with anything before attempting to send them to the web server;<br>the "required" attribute will not allow the user to transmit anything to the<br>web server until these two fields are non-empty.<div><br></div><div>The Email form has another attribute<br>(type="email") which is also used by the web browser to check whether the<br>user entered a valid email before transmitting it to the web server.&nbsp;<br><div><div><br></div><div>The "required<br>minlength" HTML attribute (assigned to the Password and Confirm fields) is used by<br>the user's web browser to prevent the user from entering a password less<br>than 8 characters. In other words, the frontend HTML code will not allow<br>the user to transmit anything to the web server until the user enters<br>a password of at least 8 characters.</div><div><br></div><div><b><u>Backend validation logic:</u></b></div><div>If the user's registration account<br>info satisfies the minimum length requirements (and the Email and Username fields are<br>non-empty), the user's web browser then sends the entered data to the web<br>server as a POST request. The web server receives this POST request and<br>extracts the email, username, password, and password confirmation data, saving each form's contents<br>as variables in PHP for further backend evaluation.<br></div><div><br></div><div>If the user happened to enter<br>an email address with a hostname but without a top-level domain (i.e. "user1@abc"),<br>the entered address is still included in the POST request sent to the<br>web server, except now a PHP function is_valid_email() is used to identify that<br>the email is missing a top-level domain and return an error message.&nbsp;<br></div><div><br></div><div>If, somehow,<br>the frontend HTML code used to validate the user's entered data did not<br>prevent the user's POST request from leaving fields blank, then the PHP variables<br>storing that info will be blank. The empty() function is then used to<br>check if these fields are empty and return an appropriate error message. If<br>the user's POST request somehow contains a password less than 8 characters, the<br>strlen() function is then used for checking the password's length and throwing an<br>error message if it is less than 8 characters long.</div><div><br></div><div>Once the backend code<br>has determined that the user's entered data is syntactically valid, a hash value<br>is calculated from the user's password (so that the web server doesn't store<br>the password in plaintext). The PHP code running on the server then attempts<br>to make a connection to a MySQL database. Once the database connection is<br>opened, it attempts to execute a query for inserting the user's account info<br>(note the user's password is saved as a cryptographic hash) as a new<br>row in the Users table.</div></div></div><div><br></div><div>The Users table has pre-set conditions (specifically the "unique"<br>condition) to prevent rows with duplicate usernames or emails from being created. If<br>the "INSERT" MySQL query fails because of these restrictions, then two other "SELECT"<br>queries are used by the web server to fetch a row with a<br>pre-existing username or email address from the Users table. If the result of<br>any of those two queries is non-null, then it gets cast to a<br>Boolean value and the appropriate error message is displayed.</div><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 2: </em> Feature: User will be able to login to their account </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add one or more screenshots of the application showing the form and validation errors per the feature requirements</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://i.imgur.com/5O2Zyh9.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Entering the wrong password for an existing user (before submitting form)<br></p>
</td></tr>
<tr><td><img width="768px" src="https://i.imgur.com/4eI8rl2.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Entering the wrong password for an existing user (after submitting form)<br></p>
</td></tr>
<tr><td><img width="768px" src="https://i.imgur.com/Vf1Cjvl.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Attempting to log into an account that doesn&#39;t exist (before submitting form)<br></p>
</td></tr>
<tr><td><img width="768px" src="https://i.imgur.com/hdVnxxE.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Attempting to log into an account that doesn&#39;t exist (after submitting form)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot of successful login</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://i.imgur.com/iv69Xjr.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Homepage before logging in<br></p>
</td></tr>
<tr><td><img width="768px" src="https://i.imgur.com/JKRU3uP.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Login page with valid credentials<br></p>
</td></tr>
<tr><td><img width="768px" src="https://i.imgur.com/KMuTEbx.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Welcome message after logging in successfully<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/Bassil-Saleh/bs92-IT202-102/pull/14">https://github.com/Bassil-Saleh/bs92-IT202-102/pull/14</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Explain briefly how the process/code works</td></tr>
<tr><td> <em>Response:</em> <p><b><u>Frontend validation logic:</u></b><div>When the user has finished filling out the Email and Password<br>forms and hits the &quot;Login&quot; button, the &quot;required&quot; HTML attribute (assigned to the<br>Email form) is used by the user&#39;s web browser to enforce a non-null<br>value for that field. In other words, the frontend HTML code prevents the<br>user from leaving the field blank before the web browser attempts to send<br>a POST request to the web server.</div><div><br></div><div>The Email form has another attribute (type=&quot;email&quot;)<br>which is also used by the web browser to enforce the syntax rules<br>of a proper email address before sending a POST request to the web<br>server. However, this frontend code does not prevent the user from entering an<br>email address without a top-level domain (i.e. username@abc); since such an email address<br>is technically not syntactically invalid, the task of rejecting it is left to<br>the backend PHP code.<br></div><div><br></div><div>The &quot;required minlength&quot; attribute (assigned to the Password form) is<br>used by the user&#39;s web browser to prevent the user from transmitting a<br>POST request back to the web server until they enter a password of<br>at least 8 characters long.</div><div><br></div><div><b><u>Backend validation logic:</u></b></div><div>If the user entered an email address<br>and password that satisfies the minimum length requirement and hits &quot;Login&quot;, the web<br>browser transmits this data back to the web server as a POST request.<br>The web server&#39;s PHP code extracts the email address and password entered by<br>the user from the POST request and saves them as variables for further<br>scanning.</div><div><br></div><div>If the POST request send by the user&#39;s web browser contains an email<br>without a top-level domain, the is_valid_email() function identifies this and sends back an<br>error message to the user&#39;s web browser.</div><div><br></div><div>If, somehow, the POST request sent by<br>the user&#39;s web browser has an empty password field, then the PHP variable<br>storing that value will be blank. The empty() function will identify this and<br>the web server will then send an appropriate error message.</div><div><br></div><div>If the email address<br>and password in the user&#39;s POST request meets the correct syntax rules, then<br>the PHP code running on the web server will attempt to make a<br>connection to a MySQL database. Once the connection is opened, a query is<br>executed to search the Users table for a row containing the entered email<br>address. If such an address is not found, then the web server sends<br>back a message saying an account with said address was not found.</div><div><br></div><div>If a<br>matching account is found, then a cryptographic hash is generated from the password<br>which the user entered. This hash is compared with the hash from the<br>result of the MySQL query (since the web server stores the passwords of<br>registered users as hashes, not in plain text). If they don&#39;t match, then<br>a message saying the wrong password was entered is sent back to the<br>user. If they do match, then the web server saves the user&#39;s username<br>in the $_SESSION array, which keep track of the logged in user until<br>they close their web browser. A MySQL query is used to retrieve any<br>roles associated with the user&#39;s account (i.e. an administrator role). Once the user&#39;s<br>roles has been retrieved, the web server then redirects the user to the<br>homepage, where a welcome message is displayed if the user is currently logged<br>in.</div><br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 3: </em> Feat: Users will be able to logout </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot showing the successful logout message</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://i.imgur.com/lgDOiR9.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot showing message after logging out<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot showing the logged out user can't access a login-protected page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://i.imgur.com/Gh2vOjY.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Message displayed on Profile page when user is not logged in.<br></p>
</td></tr>
<tr><td><img width="768px" src="https://i.imgur.com/OOBgGIO.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Another screenshot to demonstrate that the account info forms are not visible unless<br>the user is logged in.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/Bassil-Saleh/bs92-IT202-102/pull/16">https://github.com/Bassil-Saleh/bs92-IT202-102/pull/16</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Explain briefly how the process/code works</td></tr>
<tr><td> <em>Response:</em> <p>In profile.php, the input forms for the user account info (Email, Username, Current/New/Confirm<br>Password) are wrapped around a block of PHP code that only displays them<br>if the user is currently logged in. This is accomplished by placing a<br>&lt;?php if (is_logged_in()): ?&gt; tag before the HTML forms and a &lt;?php endif;<br>?&gt; tag after the HTML forms. If the user isn&#39;t logged in, a<br>message is printed explaining that the Profile page is not accessible unless they<br>are logged in.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 4: </em> Feature: Basic Security Rules Implemented / Basic Roles Implemented </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot showing the logged out user can't access a login-protected page (may be the same as similar request)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://i.imgur.com/Gh2vOjY.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Message displayed on Profile page when user is not logged in.<br></p>
</td></tr>
<tr><td><img width="768px" src="https://i.imgur.com/OOBgGIO.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Another screenshot to demonstrate that the account info forms are not visible unless<br>the user is logged in.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot showing a user without an appropriate role can't access the role-protected page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://i.imgur.com/xnFMlEE.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot after a logged in user attempts to access the List Roles page<br>without the proper role(s).<br></p>
</td></tr>
<tr><td><img width="768px" src="https://i.imgur.com/XYoHnHg.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot after a logged in user attempts to access the Create Role page<br>without the proper role(s).<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add a screenshot of the Roles table with valid data</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://i.imgur.com/3wbqeMg.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of the MySQL <code>Roles</code> table with a record containing an &quot;Admin&quot; role.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add a screenshot of the UserRoles table with valid data</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://i.imgur.com/RkqEQ2N.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Admin has a user ID#9.<br></p>
</td></tr>
<tr><td><img width="768px" src="https://i.imgur.com/X5LcDmk.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>A screenshot of the Users table showing the user ID# corresponding to the<br>Admin account.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 5: </em> Add the related pull request(s) for these features</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/Bassil-Saleh/bs92-IT202-102/pull/18">https://github.com/Bassil-Saleh/bs92-IT202-102/pull/18</a> </td></tr>
<tr><td> <em>Sub-Task 6: </em> Explain briefly how the process/code works for login-protected pages</td></tr>
<tr><td> <em>Response:</em> <p>In the &quot;profile.php&quot; page, the input forms for the user account info (Email,<br>Username, Current/New/Confirm Password) are wrapped around a block of PHP code that only<br>displays them if the user is currently logged in. This is accomplished by<br>placing a &lt;?php if (is_logged_in()):&nbsp;?&gt; tag before the HTML forms and a &lt;?php<br>endif; ?&gt; tag after the HTML forms. The is_logged_in() helper function returns true<br>if a user is logged in and false otherwise; the content between the<br>&lt;?php if (is_logged_in()):&nbsp;?&gt; and &lt;?php endif; ?&gt; tags is displayed only if is_logged_in()<br>returns true.&nbsp;The is_logged_in() helper function is also used to determine whether or not<br>to print a message is printed explaining that the Profile page is not<br>accessible unless they are logged in.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 7: </em> Explain briefly how the process/code works for role-protected pages</td></tr>
<tr><td> <em>Response:</em> <p>On the &quot;create_role.php&quot; and &quot;list_roles.php&quot; web pages, the web server uses the has_role()<br>helper function to check if the user currently logged in has the &quot;Admin&quot;<br>role. The user&#39;s roles are stored in a $_SESSION variable corresponding to the<br>user&#39;s roles ($_SESSION[&quot;user&quot;][&quot;roles&quot;]) as an array. The has_role() helper function cycles through each<br>element in this array and returns true if it finds a single match,<br>and returns false otherwise. If has_role() returns false on either page, the flash()<br>helper function pushes a warning message to the&nbsp;$_SESSION[&#39;flash&#39;] array and then redirects the<br>user to the home page. On &quot;home.php&quot;, the displayFlashMessages() function retrieves any messages<br>from the $_SESSION[&#39;flash&#39;] array by calling getMessages(), then outputting each message at a<br>time in a &lt;div&gt; element.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 5: </em> Feature: Site should have basic styles/theme applied; everything should be styled </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots to show examples of your site's styles/theme</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fbs92%2F2024-03-28T01.50.13M1_Create_Role_Style.png.webp?alt=media&token=b42ac402-5556-408c-a6fd-83acc6b96c75"/></td></tr>
<tr><td> <em>Caption:</em> <p>Create Role webpage<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fbs92%2F2024-03-28T01.50.25M1_Homepage_Style01.png.webp?alt=media&token=e992b0cd-1124-4bc1-bb24-77249b534c07"/></td></tr>
<tr><td> <em>Caption:</em> <p>Homepage (not logged in)<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fbs92%2F2024-03-28T01.50.29M1_Homepage_Style02.png.webp?alt=media&token=b068d177-2976-4bb0-a47d-f9cae69c9640"/></td></tr>
<tr><td> <em>Caption:</em> <p>Homepage (logged in)<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fbs92%2F2024-03-28T01.50.36M1_List_Roles_Style.png.webp?alt=media&token=2365ae2e-89aa-483f-adc0-38632515be9f"/></td></tr>
<tr><td> <em>Caption:</em> <p>List Roles page<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fbs92%2F2024-03-28T01.50.42M1_Login_Style.png.webp?alt=media&token=099e1a5a-b57c-4f89-8e83-4eec401933de"/></td></tr>
<tr><td> <em>Caption:</em> <p>Login page<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fbs92%2F2024-03-28T01.50.53M1_Logout_Style.png.webp?alt=media&token=79a5f704-696f-405c-b99a-327b421d69be"/></td></tr>
<tr><td> <em>Caption:</em> <p>After logging out<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fbs92%2F2024-03-28T01.51.02M1_Profile_Style.png.webp?alt=media&token=f42d850d-9b86-4611-984a-de20eecd514f"/></td></tr>
<tr><td> <em>Caption:</em> <p>Profile page<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fbs92%2F2024-03-28T01.51.09M1_Registration_Style01.png.webp?alt=media&token=43da9872-d09a-40f9-8159-6f4642b5fcad"/></td></tr>
<tr><td> <em>Caption:</em> <p>Registration page (before submitting)<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fbs92%2F2024-03-28T01.51.19M1_Registration_Style02.png.webp?alt=media&token=5a6635cb-2a95-4b7b-94c8-afcb8744f9ae"/></td></tr>
<tr><td> <em>Caption:</em> <p>Registration page (success)<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fbs92%2F2024-03-28T01.51.24M1_Registration_Style03.png.webp?alt=media&token=f1ed9e9a-4a62-40db-b8e9-9280d0cece8f"/></td></tr>
<tr><td> <em>Caption:</em> <p>Registration (error messages)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/Bassil-Saleh/bs92-IT202-102/pull/21">https://github.com/Bassil-Saleh/bs92-IT202-102/pull/21</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Briefly explain your CSS at a high level</td></tr>
<tr><td> <em>Response:</em> <div>General:</div><div><ul><li>Body text and headers use Verdana font</li><li>Text input forms user Courier New</li><li>Non-white background<br>color</li><li>Spacing between text elements and input fields</li></ul></div>Navigation:<div><ul><li>Rounded corners</li><li>Changes color when mouse hovers over<br>each link</li></ul><div>Forms:</div></div><div><ul><li>Padding between text fields</li><li>Text fields use Courier New</li></ul><div>Tables:</div></div><div><ul><li>Added separate background colors for<br>table header and table rows</li><li>Padding in table rows</li></ul><div>Buttons:</div></div><div><ul><li>Submit buttons are larger, with rounded<br>corners and bold Verdana text</li><li>Search and toggle buttons are slightly larger, and have<br>rounded corners and bold Verdana text</li></ul></div><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 6: </em> Feature: Any output messages/errors should be "user friendly" </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots of some examples of errors/messages</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fbs92%2F2024-03-30T01.09.59M1_Profile_Username_Taken.png.webp?alt=media&token=f4edf3c2-c0b5-43fb-8f04-70ef63d659de"/></td></tr>
<tr><td> <em>Caption:</em> <p>Error message shown if the user attempts to change their username to one<br>that&#39;s already taken.<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fbs92%2F2024-03-30T01.10.36M1_Register_Username_Taken.png.webp?alt=media&token=3c298b1f-28f8-4c9a-9fe7-6b96c7e01dff"/></td></tr>
<tr><td> <em>Caption:</em> <p>Error message shown if the user attempts to make a new account with<br>a username that&#39;s already taken.<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fbs92%2F2024-03-30T01.11.11M1_Profile_Wrong_Current_Password.png.webp?alt=media&token=2c0d5522-3f2c-4f75-b443-235de9beb5a0"/></td></tr>
<tr><td> <em>Caption:</em> <p>Error message explaining that the user can&#39;t reset their password because they entered<br>their current password incorrectly.<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fbs92%2F2024-03-30T01.11.57M1_Profile_Denied.png.webp?alt=media&token=eff89fb4-452d-457c-9bf2-9dff7e1d397d"/></td></tr>
<tr><td> <em>Caption:</em> <p>Error message explaining that the user can&#39;t view the Profile webpage unless they&#39;re<br>logged into an account.<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fbs92%2F2024-03-30T01.12.44M1_Not_Admin_Role.png.webp?alt=media&token=49bb59ed-344b-49e3-b94d-c8f0a515fb9d"/></td></tr>
<tr><td> <em>Caption:</em> <p>Homepage message notifying the logged in user that they don&#39;t have admin privileges.<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fbs92%2F2024-03-30T01.13.21M1_List_Roles_Denied.png.webp?alt=media&token=fb8506af-09a7-404d-88f6-748d880f0a0a"/></td></tr>
<tr><td> <em>Caption:</em> <p>Error message explaining that the user doesn&#39;t have permission to view the &quot;List<br>Roles&quot; page.<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fbs92%2F2024-03-30T01.14.17M1_Email_Taken.png.webp?alt=media&token=2651b979-1308-4861-8da0-2904414c5181"/></td></tr>
<tr><td> <em>Caption:</em> <p>Error message shown on Profile page when user attempts to change their email<br>to one that&#39;s already taken by another account.<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fbs92%2F2024-03-30T01.15.16M1_Email_Already_Exists.png.webp?alt=media&token=35c26ca4-1630-432b-8ac2-a0f22411d4ba"/></td></tr>
<tr><td> <em>Caption:</em> <p>Error message shown when user attempts to create a new account with an<br>email address that&#39;s already taken by another account.<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fbs92%2F2024-03-30T01.16.30M1_Create_Role_Denied.png.webp?alt=media&token=91a38435-200a-4190-908f-b6025fcd073b"/></td></tr>
<tr><td> <em>Caption:</em> <p>Error message explaining that the user doesn&#39;t have permission to view the &quot;Create<br>Role&quot; page.<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fbs92%2F2024-03-30T01.17.21M1_Admin_Role.png.webp?alt=media&token=74949636-6f45-4fef-9a2b-717d2cda9c91"/></td></tr>
<tr><td> <em>Caption:</em> <p>Homepage message notifying the user that they have admin privileges.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a related pull request</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/Bassil-Saleh/bs92-IT202-102/pull/23">https://github.com/Bassil-Saleh/bs92-IT202-102/pull/23</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Briefly explain how you made messages user friendly</td></tr>
<tr><td> <em>Response:</em> <p>In the Profile page:<div><ul><li>The user&#39;s current email &amp; username are both echoed and<br>preceded by bold text labels &quot;Current email:&quot; and &quot;Current username:&quot;. Also, the current<br>email and username will update after refreshing the page if the user decided<br>to change their email and/or username.</li><li>The labels for text input fields &quot;Email&quot; and<br>&quot;Username&quot; were rewritten as &quot;Change Email To:&quot; and &quot;Change Username To:&quot; respectively to<br>make the input fields&#39; intended function more clear to the user.</li><li>&quot;Confirm Password&quot; was<br>rewritten as &quot;Confirm New Password&quot; to avoid ambiguity between whether the user&#39;s current<br>password or the user&#39;s new password should be typed twice.</li><li>If the password entered<br>in &quot;Current Password:&quot; is incorrect, the error message will explicitly state that the<br>password could not be reset because of this.</li><li>If the text in &quot;New Password:&quot;<br>and &quot;Confirm New Password:&quot; don&#39;t match, the error message will explicitly state that<br>the password could not be reset because of this.</li><li>The &quot;Profile saved&quot; message was<br>rewritten to &quot;New email/username saved.&quot;. Since it is possible for the user to<br>successfully change their username and/or email without being able to successfully change their<br>password, the rewritten message avoids this ambiguity.<br></li><li>If the user isn&#39;t logged in, a<br>message will explain that they can&#39;t access this page.</li></ul><div>In the homepage:</div></div><div><ul><li>If the user<br>is logged in, the PHP code will attempt to retrieve an array in<br>$_SESSION containing the user&#39;s role(s). If the array contains the sting &#39;Admin&#39;, a<br>message will display notifying the user that they have admin privileges. Otherwise, the<br>message will state that the user lacks admin privileges.</li><li>If the user isn&#39;t logged<br>in, then a message will notify the user they aren&#39;t logged in.</li></ul></div><br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 7: </em> Feature: Users will be able to see their profile </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots of the User Profile page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fbs92%2F2024-03-30T01.55.46M1_Profile_View.png.webp?alt=media&token=1e80ae2c-2c83-4b9d-b44e-e1a92832c3de"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of the Profile page for a logged in user. Note the &quot;Change<br>Email To:&quot; and &quot;Change Username To:&quot; fields are automatically filled with the user&#39;s<br>current email and username.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/Bassil-Saleh/bs92-IT202-102/pull/25">https://github.com/Bassil-Saleh/bs92-IT202-102/pull/25</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/Bassil-Saleh/bs92-IT202-102/pull/27">https://github.com/Bassil-Saleh/bs92-IT202-102/pull/27</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Explain briefly how the process/code works (view only)</td></tr>
<tr><td> <em>Response:</em> <p>The PHP function is_logged_in() checks for an active user session (in other words,<br>whether or not the user is logged in). If the user is logged<br>in, this function returns True, and two &lt;div&gt; elements are echoed to the<br>HTML document. Inside each of these &lt;div&gt; elements, PHP retrieves the user&#39;s current<br>email address and username via $_SESSION[&quot;user&quot;][&quot;email&quot;] and $_SESSION[&quot;user&quot;][&quot;username&quot;], respectively.<div><br></div><div>The is_logged_in() function is also<br>used by PHP to prevent the user input forms from loading if the<br>user is not logged in. It achieves this by wrapping the HTML &lt;form&gt;<br>in between a &lt;?php if (is_logged_in()): ?&gt; tag and &lt;?php endif; ?&gt; tag;<br>the contents in between these tags will not be sent to the user&#39;s<br>web browser unless is_logged_in() returns True (since it doesn&#39;t make sense to allow<br>someone to access these fields if they aren&#39;t logged in).</div><div><br></div><div>Assuming the user is<br>logged in, the &quot;Change Email To:&quot; and &quot;Change Username To:&quot; &lt;input&gt; text fields<br>are then prefilled with their current email &amp; username. This is because each<br>&lt;input&gt; tag has a &quot;value&quot; attribute set to the result of an inline<br>PHP statement. In this case, &lt;?php se($email)?&gt; and &lt;?php se($username)?&gt; are used to<br>prefill each form with the current email and password (in case the user<br>only wants to reset their password). The se() PHP function is implemented in<br>&quot;safer_echo.php&quot;; since the passed arguments are strings, se() scans the string for characters<br>that can be represented as HTML entities (i.e. quotes, $, &lt;, &gt;, etc.)<br>and returns the string with said characters as their HTML entity codes. Doing<br>so prevents the user from entering something that could be interpreted as executable<br>code (i.e. malicious code enclosed in &lt;script&gt;&lt;/script&gt; tags).<br></div><br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 8: </em> Feature: User will be able to edit their profile </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots of the User Profile page validation messages and success messages</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fbs92%2F2024-03-30T03.07.47M1_Email_Taken.png.webp?alt=media&token=8e398951-df46-4481-bc41-3bb1e31cceb3"/></td></tr>
<tr><td> <em>Caption:</em> <p>Message saying that the entered email address is already taken by another account.<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fbs92%2F2024-03-30T03.08.37M1_Profile_Username_Taken.png.webp?alt=media&token=f5558665-3e6e-49d8-9279-de63090b3dff"/></td></tr>
<tr><td> <em>Caption:</em> <p>Message saying that the entered username is already taken by another account.<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fbs92%2F2024-03-30T03.10.12M1_Profile_Wrong_Current_Password.png.webp?alt=media&token=fc666577-e8d1-4878-9faa-ff33697a56c5"/></td></tr>
<tr><td> <em>Caption:</em> <p>Message saying that the user entered their current password incorrectly.<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fbs92%2F2024-03-30T03.12.18M1_Profile_New_Password_Mismatch.png.webp?alt=media&token=47aa2ac3-7281-4f86-b1d8-36b5d0fae3ee"/></td></tr>
<tr><td> <em>Caption:</em> <p>Message saying that the password could not be changed because the &quot;New Password&quot;<br>and &quot;Confirm New Password&quot; fields don&#39;t match<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fbs92%2F2024-03-30T16.21.32M1_Change_Email_Before.png.webp?alt=media&token=eb8999d1-0796-4980-aa84-3609825920ea"/></td></tr>
<tr><td> <em>Caption:</em> <p>Profile page before changing the user account&#39;s email address.<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fbs92%2F2024-03-30T16.22.18M1_Change_Email_After.png.webp?alt=media&token=52b36453-3503-4833-86b9-82bad4634835"/></td></tr>
<tr><td> <em>Caption:</em> <p>Profile page message after changing the user account&#39;s email address. Clicking &quot;Update Profile&quot;<br>a second time (or clicking &quot;Profile&quot; in the navigation bar, or hitting Refresh)<br>updates the &quot;Current Email&quot; element.<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fbs92%2F2024-03-30T16.24.52M1_Change_Username_Before.png.webp?alt=media&token=f6c7d618-416a-43f1-8242-4ceb347c04fc"/></td></tr>
<tr><td> <em>Caption:</em> <p>Profile page before changing username.<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fbs92%2F2024-03-30T16.25.14M1_Change_Username_After.png.webp?alt=media&token=81d7d32d-d897-4bc4-bc4b-71608e8d75a0"/></td></tr>
<tr><td> <em>Caption:</em> <p>Profile page message after successfully changing username. Clicking &quot;Update Profile&quot; a second time<br>(or clicking &quot;Profile&quot; in the navigation bar, or hitting Refresh) updates the &quot;Current<br>Username&quot; element.<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fbs92%2F2024-03-30T16.29.39M1_Password_Change.png.webp?alt=media&token=57dad55a-3885-45a8-890e-96baa994c6d7"/></td></tr>
<tr><td> <em>Caption:</em> <p>Profile page message after user successfully changed password.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add before and after screenshots of the Users table when a user edits their profile</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fbs92%2F2024-03-30T16.35.22M1_Database_Before_Password_Change.png.webp?alt=media&token=c2e52f35-06be-4052-b3f7-4bde60bc07b5"/></td></tr>
<tr><td> <em>Caption:</em> <p>Database before user account (highlighted row) changes their password.<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fbs92%2F2024-03-30T16.36.01M1_Database_After_Password_Change.png.webp?alt=media&token=7d5a161b-d2f8-41d5-a77e-6a3ecc566e16"/></td></tr>
<tr><td> <em>Caption:</em> <p>Database after user account (highlighted row) changes their password.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/Bassil-Saleh/bs92-IT202-102/pull/29">https://github.com/Bassil-Saleh/bs92-IT202-102/pull/29</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Explain briefly how the process/code works (edit only)</td></tr>
<tr><td> <em>Response:</em> <p>If the user is logged in, then the is_logged_in() function returns True, allowing<br>the HTML form between the&nbsp;&lt;?php if (is_logged_in()): ?&gt; and&nbsp;&lt;?php endif; ?&gt; tags to<br>be displayed to the user.<div><br></div><div>The form uses the POST method, which places the<br>user&#39;s typed input in the body of the HTTP request sent by the<br>user&#39;s web browser to the web server (as opposed to being embedded within<br>the URL as with the GET method). After the user clicks submit, the<br>PHP server checks if all three fields &quot;Current Password&quot;, &quot;New Password&quot;, and &quot;Confirm<br>New Password&quot; fields are non-empty before attempting to execute any SQL queries with<br>password data. Otherwise, if the user happened to enter a new password less<br>than 8 characters (or left the &quot;New Password&quot; field completely blank), then they<br>won&#39;t be able to log back into their account because the Login page<br>enforces restrictions on the type of data it will accept in the &quot;Password&quot;<br>field. Upon submitting the form successfully, the validate() JavaScript function is used to<br>check whether or not the &quot;New Password&quot; and &quot;Confirm New Password&quot; fields match.</div><div><br></div><div>The<br>type=&quot;email&quot; attribute in the &quot;Change Email To:&quot; &lt;input&gt; field serves as front-end validation<br>to prevent the user from entering an incorrect email address. But if the<br>user happened to enter a syntactically valid email address that is missing a<br>top-level domain (i.e. username@hostname), then the is_valid_email() PHP function returns False and prevents<br>the PHP code from executing a SQL query for updating the user&#39;s email.<br>The empty() function is used to check whether or not the user left<br>the &quot;Change Email To:&quot; &lt;input&gt; field blank. Without these checks, it is possible<br>for the user to get locked out of their account, since the Login<br>page doesn&#39;t allow the user to login with an invalid (or missing) email<br>address.</div><div><br></div><div>The empty() function is also used to check whether the user left the<br>&quot;Change Username To:&quot; &lt;input&gt; field blank. Although in this stage of the project<br>the user doesn&#39;t need their username to login (yet), having an empty username<br>can be problematic if later stages of the project require some non-empty username.<br>It also doesn&#39;t make much sense to have a nameless user account.</div><br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 9: </em> Issues and Project Board </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707834-bf5a5b13-ec36-4597-9741-aa830c195be2.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots showing which issues are done/closed (project board) Incomplete Issues should not be closed</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fbs92%2F2024-03-30T18.03.14M1_Project_Tasks01.png.webp?alt=media&token=b207c8df-fa1e-43e3-8c1a-55ea083a883e"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of GitHub Project for Milestone 1 (features 1 to 7)<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Fbs92%2F2024-03-30T18.03.56M1_Project_Tasks02.png.webp?alt=media&token=27c0e5e9-20ed-4ea3-a423-20ddfc30e622"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of GitHub Project for Milestone 1 (features 7 to 9)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Include a direct link to your Project Board</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/users/Bassil-Saleh/projects/1/views/1">https://github.com/users/Bassil-Saleh/projects/1/views/1</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Prod Application Link to Login Page</td></tr>
<tr><td>Not provided</td></tr>
</table></td></tr>
<table><tr><td><em>Grading Link: </em><a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-102-S2024/it202-milestone1-deliverable/grade/bs92" target="_blank">Grading</a></td></tr></table>