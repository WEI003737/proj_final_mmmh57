<style>

.container{
    max-width: 1440px;
    margin: 0 auto;
} 


/* 上標題  */
.j_eng_title{
    font-size: 36px;
    padding-right:30px;
    font-family:sans-serif;
}

.j_chinese_title
{font-size: 36px;}

.j_dashline{
border-bottom-style:dashed;
border-bottom-color:#ccc;
border-width: 3px;
}

@media screen and (max-width: 700px){
    .j_dashline{margin:0;border-width: 2px;}
    .j_eng_title, .j_chinese_title{margin-bottom:5px;font-size: 16px;}
    .j_eng_title2{font-size:12px}
}

/* 分頁通用 */
.member_left_list,.member_left_list_totop{
    margin:30px;
    text-align:center;
}

.leftlist_underline{
    margin-bottom: 30px;
}
@media screen and (max-width: 700px){
.member_left_list_totop{margin-bottom:0px}
}

/* 桌機左標 */

.leftlist_underline:hover{
    border-left: #CA054D solid 5px ;
    color:#CA054D; 
    transition:0.3S;
}

 .member_left_list a{
    color:black;
    text-decoration:none;
}

.member_left_list a:hover{
    color:#CA054D;
    text-decoration:none;  
}

/* 手機上標 */

.member_left_list_totop a{
    color:black;
    text-decoration:none;
}

.member_left_list_totop a:hover{
    color:#CA054D;
    text-decoration:none;  
}

#member_left_list_totop{
    display: none;
    font-size:11px;}

/* {border-bottom:5px #CA054D solid; padding:3px;transition:0.5S} */

@media screen and (max-width: 700px){
    .member_left_list{display:none;}
    #member_left_list_totop{ display:block;}
}


/* padding */
.j_padb_100{padding-bottom: 100px;}
.j_padb_200{padding-bottom: 200px;}
.j_padb_50{padding-bottom: 50px;}
.j_padt_100{padding-top:100px;}
.j_padt_50{padding-top:50px;}
.j_padt_25{padding-top:25px;}
.j_padr_22{padding-right:22px;}
.j_padr_100{padding-right:100px;}

@media screen and (max-width: 700px){
    .j_padb_100{padding-bottom: 25px;}
    .j_padb_200{padding-bottom: 50px;}
    .j_padt_100{padding-top:25px}
    .j_padt_50{padding-top:25px;}
}

#register-area{
        position:relative;
    }

    /* Customize the label (the container) */
    .j_checkbox_container {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 22px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default checkbox */
.j_checkbox_container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

/* Create a custom checkbox */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.container input:checked ~ .checkmark {
  background-color:#CA054D ;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
.container input:checked ~ .checkmark:after {
  display: block;
}

/* Style the checkmark/indicator */
.container .checkmark:after {
  left: 9px;
  top: 5px;
  width: 5px;
  height: 10px;
  border: solid white;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}

#checkbox_help{
    font-size:20px;
    color:#CA054D;
}

 




</style>

