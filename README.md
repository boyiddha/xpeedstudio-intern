# xpeedstudio-intern

### Tasks
<ol>
  <li> Create a MySQL DB table with the following requirements and a frontend submission form for storing the data.
  <ul> ### Field/ column list:
    <li>
     
id (bigint 20) ai
amount (int 10) *
buyer (varchar 255) *
receipt_id (varchar 20) *
items (varchar 255) *
buyer_email (varchar 50) *
buyer_ip (varchar 20)
note (text) *
city (varchar 20) *
phone (varchar 20) *
entry_at (date)
entry_by (init 10) 

    </li>
    <li>* marked columns can be submitted through the mentioned frontend form.</li>
<li>Buyer_ip should be the user’s browser ip and will be automatically filled up from the backend.</li>
<li></li>Entry_at is the submission date in the local timezone.</li>
<li>There will be a backend validation process according to the following requirements:
Amount: only numbers.
Buyer: only text, spaces and numbers, not more than 20 characters.
Receipt_id: only text.
Items: only text.
Buyer_email: only emails.
Note: anything, not more than 30 words, and can be input unicode(bangla text) characters too.
City: only text and spaces.
Phone: only numbers.
Entry_by: only numbers. </li>


  </ul>
  </li>
  <li>Create a simple report page where users can see all the submissions and search it by user id. </li>
  <li>The whole project must be implemented according to OOP format without any readymade PHP frameworks</li>
</ol>


# ScreenShots:
