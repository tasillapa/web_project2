<?php include 'main_personnal.php'; ?>
<html>
    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>รายงาน</h2>
            </div>       
        </div>
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">

                        <h2> บันทึกข้อมูลการอบรม/สัมมนา/ดูงาน</h2>

                        <ul class="header-dropdown m-r--5">
                            <li class="dropdown">
                                <a class="dropdown-toggle" role="button" aria-expanded="false" aria-haspopup="true" href="javascript:void(0);" data-toggle="dropdown">
                                    <i class="material-icons">more_vert</i>
                                </a>
                                <ul class="dropdown-menu pull-right">
                                    <li><a class=" waves-effect waves-block" href="javascript:void(0);">Action</a></li>
                                    <li><a class=" waves-effect waves-block" href="javascript:void(0);">Another action</a></li>
                                    <li><a class=" waves-effect waves-block" href="javascript:void(0);">Something else here</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="body">
                        <div class="row" style="padding: 10px 0px 10px 0px;">
                            <div class="col-md-7"></div>
                            <div class="col-md-2" style="text-align:right;">เลขที่หนังสือ</div>
                            <div class="col-md-3">
                                <input type="text" class="form-control" id="dev_doc_no" name="dev_doc_no" value="สธ 0203.0916456" style="font-size: 22px;">
                            </div>
                        </div>
                        <div class="row" style="padding: 10px 0px 10px 0px;">
                            <div class="col-md-7"></div>
                            <div class="col-md-2" style="text-align:right;">วันที่</div>
                            <div class="col-md-2">

                                <input type="text" class="form-control datepicker " id="dev_date" data-date-format="dd/mm/yyyy" data-date-language="th-th" name="dev_date" value="22/02/2561" style="font-size: 25px;">

                            </div>
                        </div>

                        <div class="row" style="padding: 10px 0px 10px 0px;">

                            <div class="col-md-3" style="padding-left: 60px;"><b>ผู้ขออนุมัติ</b></div>
                            <div class="col-md-8">
                                <input type="hidden" name="dev_ps_id" value="950">
                                <input type="hidden" name="budget_year" value="2018 ">
                                <input type="hidden" name="dev_id" value="5936">
                                นางพรพิมล ศรีดาเลิศ <b>ตำแหน่ง</b> รองผู้อำนวยงาน <b></b> </div>
                        </div>

                        <div class="row" style="padding: 10px 0px 10px 0px;">
                            <div class="col-md-3" style="padding-left: 60px;"><b>เรื่องที่ไปเข้าร่วม</b> <label style="color:red;">*</label></div>
                            <div class="col-md-9" id="div_dev_topic">
                                <input type="text" class="form-control" name="dev_topic" id="dev_topic" value="ss" validate="" style="font-size: 25px;">
                            </div>
                        </div>

                        <div class="row" style="padding: 10px 0px 10px 0px;">
                            <div class="col-md-3" style="padding-left: 60px;">
                                <b>วันที่ไปประชุม/อบรม/สัมมนา</b> <label style="color:red;">*</label>
                            </div>
                            <div class="col-md-9">
                                <div class="input-daterange input-group" id="datepicker-range" data-date-format="dd/mm/yyyy" data-date-language="th-th">
                                    <input type="text" class="input-small form-control datepicker" id="dev_start_date" name="dev_start_date" value="22/02/2561" validate="" style="font-size: 25px;">
                                    <span class="input-group-addon">ถึง</span>
                                    <input type="text" class="input-small form-control datepicker" id="dev_end_date" name="dev_end_date" value="22/02/2561" validate="" style="font-size: 25px;">
                                </div>
                            </div>

                            <div class="col-md-9">
                                <input type="checkbox" id="dev_in" name="dev_in_college" value="Y">&nbsp;&nbsp;&nbsp;อบรมภายในวิทยาลัย
                            </div>
                        </div>

                        <div class="row go_journey" style="padding: 10px 0px 10px 0px;">

                            <div class="col-md-3" style="padding-left: 60px;"><b>วันที่เดินทาง</b> <label style="color:red;">*</label></div>
                            <div class="col-md-9">
                                <input type="checkbox" id="check_date" class="check1 " value="Y" name="check_date" checked=""> เหมือนวันที่ประชุม
                            </div>
                        </div>
                        <div class="row go_journey" id="develop_go" style="display: none;">

                            <div class="col-md-3" style="padding-left: 60px;"></div>
                            <div class="col-md-9">
                                <div id="date_start_join">
                                    <div class="input-daterange input-group" id="datepicker-range2" data-date-format="dd/mm/yyyy" data-date-language="th-th">
                                        <input type="text" class="input-small form-control" id="dev_start_go_date" name="dev_start_go_date" value="22/02/2561" data-date-format="dd/mm/yyyy" data-date-language="th-th" validate="" style="font-size: 25px;">
                                        <span class="input-group-addon">ถึง</span>
                                        <input type="text" class="input-small form-control" id="dev_end_go_date" name="dev_end_go_date" value="22/02/2561" data-date-format="dd/mm/yyyy" data-date-language="th-th" validate="" style="font-size: 25px;">
                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="row go_journey">
                            <div class="col-md-3" style="padding-left: 60px;"></div>
                            <div class="col-md-9">
                                <label>
                                    <input type="checkbox" id="inlinecheckbox1" value="Y" name="dev_check"> ขออนุมัติไม่รวมวันหยุดราชการ
                                </label>
                            </div>
                        </div>
                        <div class="row" style="padding: 10px 0px 10px 0px;">
                            <div class="col-md-3" style="padding-left: 60px;"><b>สถานที่</b> <label style="color:red;">*</label></div>
                            <div class="col-md-9" id="div_dev_place">
                                <input type="text" class="form-control" name="dev_place" id="dev_place" value="ss" validate="" style="font-size: 25px;">
                            </div>
                        </div>
                        <div class="row" style="padding: 10px 0px 10px 0px;">
                            <div class="col-md-3" style="padding-left: 60px;"><b>ประเทศ</b> <label style="color:red;">*</label></div>
                            <div class="col-md-9">
                                <div class="select2-container" id="s2id_dev_country_id" style="width:100%"><a href="javascript:void(0)" onclick="return false;" class="select2-choice" tabindex="-1">   <span class="select2-chosen">ไทย</span><abbr class="select2-search-choice-close"></abbr>   <span class="select2-arrow"><b></b></span></a><input class="select2-focusser select2-offscreen" type="text" id="s2id_autogen6"><div class="select2-drop select2-display-none select2-with-searchbox">   <div class="select2-search">       <input type="text" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="select2-input">   </div>   <ul class="select2-results">   </ul></div></div><select name="dev_country_id" id="dev_country_id" style="width:100%" tabindex="-1" class="select2-offscreen">
                                    <option value="">-----เลือก-----</option>
                                    <option value="31">กรีซ</option>
                                    <option value="32">กรีนแลนด์</option>
                                    <option value="33">กวม</option>
                                    <option value="1">กัมพูชา</option>
                                    <option value="221">กัวเดอลุป</option>
                                    <option value="34">กัวเตมาลา</option>
                                    <option value="35">กาตาร์</option>
                                    <option value="36">กานา</option>
                                    <option value="37">กาบอง</option>
                                    <option value="38">กายอานา</option>
                                    <option value="39">กินี</option>
                                    <option value="40">กินี-บิสเซา</option>
                                    <option value="41">เกรเนดา</option>
                                    <option value="2">เกาหลีใต้</option>
                                    <option value="119">เกาหลีเหนือ</option>
                                    <option value="222">เกาะคริสต์มาส</option>
                                    <option value="223">เกาะคลิปเพอร์ตัน</option>
                                    <option value="224">เกาะจาร์วิส</option>
                                    <option value="225">เกาะเซาท์จอร์เจียและหมู่เกาะเ</option>
                                    <option value="226">เกาะตรอมแลง</option>
                                    <option value="227">เกาะนอร์ฟอล์ก</option>
                                    <option value="228">เกาะนาวาสซา</option>
                                    <option value="229">เกาะบูเวต</option>
                                    <option value="230">เกาะเบเกอร์</option>
                                    <option value="42">เกาะแมน</option>
                                    <option value="231">เกาะยูโรปา(ฝรั่งเศส)</option>
                                    <option value="232">เกาะเวก</option>
                                    <option value="233">เกาะแอชมอร์และเกาะคาร์เทียร์</option>
                                    <option value="234">เกาะฮวนเดโนวา</option>
                                    <option value="235">เกาะฮาวแลนด์</option>
                                    <option value="236">เกาะเฮิร์ดและหมู่เกาะแมกดอนัล</option>
                                    <option value="237">เกิร์นซีย์</option>
                                    <option value="43">แกมเบีย</option>
                                    <option value="44">โกตดิวัวร์</option>
                                    <option value="45">คอโมโรส</option>
                                    <option value="46">คอสตาริกา</option>
                                    <option value="47">คาซัคสถาน</option>
                                    <option value="238">คิงแมนรีฟ</option>
                                    <option value="48">คิริบาส</option>
                                    <option value="49">คิวบา</option>
                                    <option value="50">คีร์กีซสถาน</option>
                                    <option value="51">คูราเซา</option>
                                    <option value="52">คูเวต</option>
                                    <option value="53">เคนยา</option>
                                    <option value="54">เคปเวิร์ด</option>
                                    <option value="3">แคนนาดา</option>
                                    <option value="55">แคเมอรูน</option>
                                    <option value="4">โครเอเชีย</option>
                                    <option value="56">โคลอมเบีย</option>
                                    <option value="57">จอร์เจีย</option>
                                    <option value="58">จอร์แดน</option>
                                    <option value="239">จอห์นสตันอะทอลล์</option>
                                    <option value="59">จาเมกา</option>
                                    <option value="60">จิบูตี</option>
                                    <option value="5">จีน</option>
                                    <option value="240">เจอร์ซีย์</option>
                                    <option value="241">ฉนวนกาซา</option>
                                    <option value="61">ชาด</option>
                                    <option value="62">ชิลี</option>
                                    <option value="63">ซานมารีโน</option>
                                    <option value="64">ซามัว</option>
                                    <option value="65">ซาอุดีอาระเบีย</option>
                                    <option value="66">ซิมบับเว</option>
                                    <option value="67">ซีเรีย</option>
                                    <option value="68">ซูดาน</option>
                                    <option value="69">ซูรินาเม</option>
                                    <option value="70">เซเชลส์</option>
                                    <option value="71">เซนต์คิตส์และเนวิส</option>
                                    <option value="72">เซนต์ลูเซีย</option>
                                    <option value="73">เซนต์วินเซนต์และเกรนาดีนส์</option>
                                    <option value="74">เซนต์เฮเลนา</option>
                                    <option value="75">เซเนกัล</option>
                                    <option value="76">เซอร์เบีย</option>
                                    <option value="77">เซาท์ซูดาน</option>
                                    <option value="78">เซียร์ราลีโอน</option>
                                    <option value="242">แซงปีแยร์และมีเกอลง</option>
                                    <option value="79">แซมเบีย</option>
                                    <option value="80">โซมาเลีย</option>
                                    <option value="81">ไซปรัส</option>
                                    <option value="6">ญี่ปุ่น</option>
                                    <option value="243">เดเกเลีย</option>
                                    <option value="82">เดนมาร์ก</option>
                                    <option value="83">โดมินิกา</option>
                                    <option value="84">ตรินิแดดและโตเบโก</option>
                                    <option value="85">ตองกา</option>
                                    <option value="86">ติมอร์-เลสเต</option>
                                    <option value="87">ตุรกี</option>
                                    <option value="88">ตูนิเซีย</option>
                                    <option value="89">ตูวาลู</option>
                                    <option value="90">เติร์กเมนิสถาน</option>
                                    <option value="244">โตเกเลา</option>
                                    <option value="91">โตโก</option>
                                    <option value="30">ไต้หวัน</option>
                                    <option value="92">ไต้หวัน</option>
                                    <option value="93">ทาจิกิสถาน</option>
                                    <option value="94">แทนซาเนีย</option>
                                    <option value="7" selected="selected">ไทย</option>
                                    <option value="95">นครรัฐวาติกัน</option>
                                    <option value="96">นอร์เวย์</option>
                                    <option value="97">นามิเบีย</option>
                                    <option value="98">นาอูรู</option>
                                    <option value="99">นิการากัว</option>
                                    <option value="245">นิวแคลิโดเนีย</option>
                                    <option value="8">นิวซีแลนด์</option>
                                    <option value="246">นีอูเอ</option>
                                    <option value="9">เนเธอร์แลนด์</option>
                                    <option value="100">เนปาล</option>
                                    <option value="101">ไนจีเรีย</option>
                                    <option value="102">ไนเจอร์</option>
                                    <option value="103">บราซิล</option>
                                    <option value="247">บริติชอินเดียนโอเชียนเทร์ริทอ</option>
                                    <option value="104">บรูไน</option>
                                    <option value="105">บอตสวานา</option>
                                    <option value="106">บอสเนียและเฮอร์เซโกวีนา</option>
                                    <option value="107">บังกลาเทศ</option>
                                    <option value="108">บัลแกเรีย</option>
                                    <option value="248">บัสซาสดาอินเดีย</option>
                                    <option value="109">บาร์เบโดส</option>
                                    <option value="110">บาห์เรน</option>
                                    <option value="111">บาฮามาส</option>
                                    <option value="112">บุรุนดี</option>
                                    <option value="113">บูร์กินาฟาโซ</option>
                                    <option value="114">เบนิน</option>
                                    <option value="10">เบลเยี่ยม</option>
                                    <option value="115">เบลารุส</option>
                                    <option value="116">เบลีซ</option>
                                    <option value="117">เบอร์มิวดา</option>
                                    <option value="118">โบลิเวีย</option>
                                    <option value="120">ประเทศเซาตูเมและปรินซิปี</option>
                                    <option value="121">ประเทศมอนเตเนโกร</option>
                                    <option value="122">ประเทศอาร์เมเนีย</option>
                                    <option value="123">ปากีสถาน</option>
                                    <option value="124">ปานามา</option>
                                    <option value="125">ปาปัวนิวกินี</option>
                                    <option value="126">ปารากวัย</option>
                                    <option value="127">ปาเลา</option>
                                    <option value="128">เปรู</option>
                                    <option value="129">เปอร์โตริโก</option>
                                    <option value="130">โปรตุเกส</option>
                                    <option value="131">โปแลนด์</option>
                                    <option value="11">ฝรั่งเศส</option>
                                    <option value="132">พม่า</option>
                                    <option value="249">แพลไมราอะทอลล์</option>
                                    <option value="133">ฟิจิ</option>
                                    <option value="134">ฟินแลนด์</option>
                                    <option value="12">ฟิลิปปินส์</option>
                                    <option value="250">เฟรนช์เกียนา</option>
                                    <option value="251">เฟรนช์เซาเทิร์นและแอนตาร์กติก</option>
                                    <option value="135">เฟรนช์โปลินีเซีย(ฝรั่งเศส)</option>
                                    <option value="136">ภูฏาน</option>
                                    <option value="137">มองโกเลีย</option>
                                    <option value="252">มอนต์เซอร์รัต</option>
                                    <option value="138">มอริเชียส</option>
                                    <option value="139">มอริเตเนีย</option>
                                    <option value="140">มอลโดวา</option>
                                    <option value="141">มอลตา</option>
                                    <option value="142">มัลดีฟส์</option>
                                    <option value="143">มาเก๊า</option>
                                    <option value="144">มาซิโดเนีย</option>
                                    <option value="145">มาดากัสการ์</option>
                                    <option value="253">มายอต</option>
                                    <option value="254">มาร์ตีนิก</option>
                                    <option value="146">มาลาวี</option>
                                    <option value="147">มาลี</option>
                                    <option value="13">มาเลเซีย</option>
                                    <option value="148">เม็กซิโก</option>
                                    <option value="14">เมียนมา</option>
                                    <option value="149">โมซัมบิก</option>
                                    <option value="150">โมนาโก</option>
                                    <option value="151">โมร็อกโก</option>
                                    <option value="152">ไมโครนีเซีย</option>
                                    <option value="255">ยานไมเอน</option>
                                    <option value="153">ยูกันดา</option>
                                    <option value="154">ยูเครน</option>
                                    <option value="155">เยเมน</option>
                                    <option value="15">เยอรมัน</option>
                                    <option value="156">รวันดา</option>
                                    <option value="157">รัสเซีย</option>
                                    <option value="256">เรอูว์นียง</option>
                                    <option value="158">โรมาเนีย</option>
                                    <option value="159">ลักเซมเบิร์ก</option>
                                    <option value="160">ลัตเวีย</option>
                                    <option value="16">ลาว</option>
                                    <option value="161">ลิกเตนสไตน์</option>
                                    <option value="162">ลิทัวเนีย</option>
                                    <option value="163">ลิเบีย</option>
                                    <option value="164">เลโซโท</option>
                                    <option value="165">เลบานอน</option>
                                    <option value="166">ไลบีเรีย</option>
                                    <option value="167">วานูอาตู</option>
                                    <option value="168">เวเนซุเอลา</option>
                                    <option value="257">เวสต์แบงก์</option>
                                    <option value="169">เวสเทิร์นสะฮารา</option>
                                    <option value="17">เวียดนาม</option>
                                    <option value="170">ศรีลังกา</option>
                                    <option value="28">สเปน</option>
                                    <option value="171">สเปน</option>
                                    <option value="258">สฟาลบาร์</option>
                                    <option value="172">สโลวาเกีย</option>
                                    <option value="173">สโลวีเนีย</option>
                                    <option value="174">สวาซิแลนด์</option>
                                    <option value="175">สวิตเซอร์แลนด์</option>
                                    <option value="26">สวีเดน</option>
                                    <option value="176">สวีเดน</option>
                                    <option value="18">สหรัฐอเมริกา</option>
                                    <option value="177">สหรัฐอาหรับเอมิเรตส์</option>
                                    <option value="178">สาธารณรัฐคองโก</option>
                                    <option value="179">สาธารณรัฐเช็ก</option>
                                    <option value="180">สาธารณรัฐโดมินิกัน</option>
                                    <option value="181">สาธารณรัฐประชาธิปไตยคองโก</option>
                                    <option value="182">สาธารณรัฐแอฟริกากลาง</option>
                                    <option value="19">สิงคโปร์</option>
                                    <option value="259">หมู่เกาะโกลริโอโซ</option>
                                    <option value="260">หมู่เกาะคอรัลซี</option>
                                    <option value="261">หมู่เกาะคุก</option>
                                    <option value="183">หมู่เกาะเคย์แมน</option>
                                    <option value="262">หมู่เกาะโคโคส(หมู่เกาะคีลิง)</option>
                                    <option value="184">หมู่เกาะโซโลมอน</option>
                                    <option value="185">หมู่เกาะเติกส์และหมู่เกาะเคค</option>
                                    <option value="186">หมู่เกาะนอร์เทิร์นมาเรียนา</option>
                                    <option value="263">หมู่เกาะบริติชเวอร์จิน</option>
                                    <option value="264">หมู่เกาะพาราเซล</option>
                                    <option value="265">หมู่เกาะพิตแคร์น</option>
                                    <option value="187">หมู่เกาะฟอล์กแลนด์</option>
                                    <option value="188">หมู่เกาะแฟโร</option>
                                    <option value="189">หมู่เกาะมาร์แชลล์</option>
                                    <option value="266">หมู่เกาะมิดเวย์</option>
                                    <option value="267">หมู่เกาะวาลลิสและหมู่เกาะฟุตู</option>
                                    <option value="268">หมู่เกาะเวอร์จินของสหรัฐอเมริ</option>
                                    <option value="269">หมู่เกาะสแปรตลี</option>
                                    <option value="190">อเมริกันซามัว</option>
                                    <option value="20">ออสเตรเลีย</option>
                                    <option value="21">ออสเตรีย</option>
                                    <option value="22">อังกฤษ</option>
                                    <option value="191">อันดอร์รา</option>
                                    <option value="192">อัฟกานิสถาน</option>
                                    <option value="270">อาโกรตีรี</option>
                                    <option value="193">อาเซอร์ไบจาน</option>
                                    <option value="194">อาร์เจนตินา</option>
                                    <option value="195">อารูบา</option>
                                    <option value="196">อิเควทอเรียลกินี</option>
                                    <option value="29">อิตาลี</option>
                                    <option value="197">อิตาลี</option>
                                    <option value="23">อินเดีย</option>
                                    <option value="24">อินโดนิเซีย</option>
                                    <option value="198">อิรัก</option>
                                    <option value="199">อิสราเอล</option>
                                    <option value="200">อิหร่าน</option>
                                    <option value="201">อียิปต์</option>
                                    <option value="202">อุซเบกิสถาน</option>
                                    <option value="203">อุรุกวัย</option>
                                    <option value="27">อูกานดา</option>
                                    <option value="204">เอกวาดอร์</option>
                                    <option value="205">เอธิโอเปีย</option>
                                    <option value="206">เอริเทรีย</option>
                                    <option value="207">เอลซัลวาดอร์</option>
                                    <option value="208">เอสโตเนีย</option>
                                    <option value="209">แองกวิลลา</option>
                                    <option value="210">แองโกลา</option>
                                    <option value="211">แอนติกาและบาร์บูดา</option>
                                    <option value="212">แอฟริกาใต้</option>
                                    <option value="213">แอลจีเรีย</option>
                                    <option value="214">แอลเบเนีย</option>
                                    <option value="215">โอมาน</option>
                                    <option value="216">ไอซ์แลนด์</option>
                                    <option value="217">ไอร์แลนด์</option>
                                    <option value="25">ฮ่องกง</option>
                                    <option value="218">ฮอนดูรัส</option>
                                    <option value="219">ฮังการี</option>
                                    <option value="220">เฮติ</option>
                                </select>
                            </div>
                        </div>
                        <div class="row" id="row_province" style="padding: 10px 0px 10px 0px">
                            <div class="col-md-3" style="padding-left: 60px;"><b>จังหวัด</b></div>
                            <div class="col-md-9">
                                <div class="select2-container" id="s2id_dev_pv_id" style="width:100%"><a href="javascript:void(0)" onclick="return false;" class="select2-choice" tabindex="-1">   <span class="select2-chosen">เพชรบุรี</span><abbr class="select2-search-choice-close"></abbr>   <span class="select2-arrow"><b></b></span></a><input class="select2-focusser select2-offscreen" type="text" id="s2id_autogen5"><div class="select2-drop select2-display-none select2-with-searchbox">   <div class="select2-search">       <input type="text" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="select2-input">   </div>   <ul class="select2-results">   </ul></div></div><select name="dev_pv_id" id="dev_pv_id" style="width:100%" tabindex="-1" class="select2-offscreen">
                                    <option>----เลือก-----</option>
                                    <option value="64">กระบี่</option>
                                    <option value="1">กรุงเทพมหานคร</option>
                                    <option value="56">กาญจนบุรี</option>
                                    <option value="34">กาฬสินธุ์</option>
                                    <option value="49">กำแพงเพชร</option>
                                    <option value="28">ขอนแก่น</option>
                                    <option value="13">จันทบุรี</option>
                                    <option value="15">ฉะเชิงเทรา</option>
                                    <option value="11"selected="">ชลบุรี</option>
                                    <option value="9">ชัยนาท</option>
                                    <option value="25">ชัยภูมิ</option>
                                    <option value="69">ชุมพร</option>
                                    <option value="45">เชียงราย</option>
                                    <option value="38">เชียงใหม่</option>
                                    <option value="72">ตรัง</option>
                                    <option value="14">ตราด</option>
                                    <option value="50">ตาก</option>
                                    <option value="17">นครนายก</option>
                                    <option value="58">นครปฐม</option>
                                    <option value="36">นครพนม</option>
                                    <option value="19">นครราชสีมา</option>
                                    <option value="63">นครศรีธรรมราช</option>
                                    <option value="47">นครสวรรค์</option>
                                    <option value="3">นนทบุรี</option>
                                    <option value="76">นราธิวาส</option>
                                    <option value="43">น่าน</option>
                                    <option value="77">บึงกาฬ</option>
                                    <option value="20">บุรีรัมย์</option>
                                    <option value="4">ปทุมธานี</option>
                                    <option value="62">ประจวบคีรีขันธ์</option>
                                    <option value="16">ปราจีนบุรี</option>
                                    <option value="74">ปัตตานี</option>
                                    <option value="5">พระนครศรีอยุธยา</option>
                                    <option value="44">พะเยา</option>
                                    <option value="65">พังงา</option>
                                    <option value="73">พัทลุง</option>
                                    <option value="53">พิจิตร</option>
                                    <option value="52">พิษณุโลก</option>
                                    <option value="61" >เพชรบุรี</option>
                                    <option value="54">เพชรบูรณ์</option>
                                    <option value="42">แพร่</option>
                                    <option value="66">ภูเก็ต</option>
                                    <option value="32">มหาสารคาม</option>
                                    <option value="37">มุกดาหาร</option>
                                    <option value="46">แม่ฮ่องสอน</option>
                                    <option value="24">ยโสธร</option>
                                    <option value="75">ยะลา</option>
                                    <option value="33">ร้อยเอ็ด</option>
                                    <option value="68">ระนอง</option>
                                    <option value="12">ระยอง</option>
                                    <option value="55">ราชบุรี</option>
                                    <option value="7">ลพบุรี</option>
                                    <option value="40">ลำปาง</option>
                                    <option value="39">ลำพูน</option>
                                    <option value="30">เลย</option>
                                    <option value="22">ศรีสะเกษ</option>
                                    <option value="35">สกลนคร</option>
                                    <option value="70">สงขลา</option>
                                    <option value="71">สตูล</option>
                                    <option value="2">สมุทรปราการ</option>
                                    <option value="60">สมุทรสงคราม</option>
                                    <option value="59">สมุทรสาคร</option>
                                    <option value="18">สระแก้ว</option>
                                    <option value="10">สระบุรี</option>
                                    <option value="8">สิงห์บุรี</option>
                                    <option value="51">สุโขทัย</option>
                                    <option value="57">สุพรรณบุรี</option>
                                    <option value="67">สุราษฎร์ธานี</option>
                                    <option value="21">สุรินทร์</option>
                                    <option value="31">หนองคาย</option>
                                    <option value="27">หนองบัวลำภู</option>
                                    <option value="6">อ่างทอง</option>
                                    <option value="26">อำนาจเจริญ</option>
                                    <option value="29">อุดรธานี</option>
                                    <option value="41">อุตรดิตถ์</option>
                                    <option value="48">อุทัยธานี</option>
                                    <option value="23">อุบลราชธานี</option>
                                </select>
                            </div>
                        </div>
                        <div class="row" style="padding: 10px 0px 10px 0px;">
                            <div class="col-md-3" style="padding-left: 60px;"><b>ผู้จัด/โครงการ</b></div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" name="dev_project" value="" style="font-size: 25px;">
                            </div>
                        </div>

                        <!---------------------------------------------------------------------------------------------------------->

                        <div class="row dev_organized" style="padding: 10px 0px 0px 0px;">
                            <div class="col-md-3" style="padding-left: 60px;"><b>ประเภทหน่วยงานที่จัด</b></div>
                            <div class="col-md-2">
                                <label>
                                    <input type="radio" name="dev_organized_type" value="0" checked="">
                                    ภายใน สบช.
                                </label>
                            </div>


                        </div>
                    </div>

                    <div class="row dev_go_service_type" style="padding: 10px 0px 10px 0px;">
                        <div class="col-md-3" style="padding-left: 60px;"><b>ประเภทการไปราชการ</b></div>
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-5">
                                    <label>
                                        <input type="radio" name="dev_go_service_type" value="0" class="check6 check10 check12" checked="">
                                        ประชุม/อบรม/สัมมนา
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <label>
                                        <input type="radio" name="dev_go_service_type" value="1" class="check6 check10 check11">
                                        เป็นวิทยากร
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <label>
                                        <input type="radio" name="dev_go_service_type" value="2" class="check6 check8 check10 check11">
                                        ประชุมราชการ
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <label>
                                        <input type="radio" name="dev_go_service_type" value="6" class="check6 check8 check10 check11">
                                        นิเทศงาน
                                    </label>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label>
                                        <input type="radio" name="dev_go_service_type" value="8" class="check6 check8 check9 check12">
                                        การอบรมหลักสูตรระยะสั้น
                                    </label>
                                </div>
                            </div>
                            <div class="row" id="train" style="display: none;">
                                <div class="row">
                                    <div class="col-md-12" style="padding-left: 55px;">
                                        <label>
                                            <input type="radio" id="inlineradio1" value="0" name="dev_study_visit"> ในประเทศ
                                        </label>
                                        <label>
                                            <input type="radio" id="inlineradio2" value="1" name="dev_study_visit"> ต่างประเทศ
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12" style="padding-left: 55px;">
                                        <label>หลักสูตร</label>
                                        <label>
                                            <div class="select2-container select2" id="s2id_autogen2" style="padding-right: 150px; width: 100%"><a href="javascript:void(0)" onclick="return false;" class="select2-choice" tabindex="-1">   <span class="select2-chosen">----เลือก-----</span><abbr class="select2-search-choice-close"></abbr>   <span class="select2-arrow"><b></b></span></a><input class="select2-focusser select2-offscreen" type="text" id="s2id_autogen3"><div class="select2-drop select2-display-none select2-with-searchbox">   <div class="select2-search">       <input type="text" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false" class="select2-input">   </div>   <ul class="select2-results">   </ul></div></div><select name="dev_ecs_id" class="select2 select2-offscreen" style="padding-right: 150px; width: 100%" tabindex="-1">
                                                <option value="">----เลือก-----</option>
                                                <option value="23"> Certificate of 21st Century Educational Management and Inspiring Leadership</option>
                                                <option value="24"> Certificate of Administrative Competency Development Training for Deputy Director(Refreshment)</option>
                                                <option value="25"> Certificate of Educational Leadership in Nursing and Public Health.</option>
                                                <option value="22"> Certificate of Effective Management for Quality Education</option>
                                                <option value="27"> Certificate of Evidence-Based Health Care       </option>
                                                <option value="28"> Certificate of PBL (Problem based Learning) Training                            </option>
                                                <option value="30"> Certificate of Short Training Course in Practicum of Clinical Instruction</option>
                                                <option value="29"> Certificate of UTCC Mini MBA in Marketing     </option>
                                                <option value="38"> dfd</option>
                                                <option value="26"> Training Program in Public Health Administration (Intermediate level)</option>
                                                <option value="31"> การสอนการพยาบาลในคลินิก</option>
                                                <option value="37"> การอบรมภาษาอังกฤษ ในโครงการพัฒนาศักยภาพด้านภาษาอังกฤษเพื่อพัฒนาคุณภาพการจัดการศึกษา</option>
                                                <option value="13"> โครงการพัฒนาศักยภาพด้านภาษาอังกฤษเพื่อพัฒนาบุคลากรด้านสาธารณสุข </option>
                                                <option value="39"> หลักสูตรการพัฒนาสมรรถนะด้านการจัดการเรียนการสอน : Humanistic Care</option>
                                                <option value="8"> อบรมการพยาบาลเฉพาะทางสาขาศาสตร์และศิลป์การสอนทางการพยาบาล</option>
                                                <option value="2"> อบรมในหลักสูตรการพยาบาลเฉพาะทาง สาขาการพยาบาลเวชปฏิบัติฉุกเฉิน</option>
                                                <option value="3"> อบรมในหลักสูตรการพยาบาลเฉพาะทาง สาขาการพยาบาลเวชปฏิบัติฉุกเฉิน</option>
                                                <option value="32"> อบรมในหลักสูตรการพยาบาลเฉพาะทางสาขาสุขภาพจิตและการพยาบาลจิตเวชศาสตร์</option>
                                                <option value="1"> อบรมระยะสั้นหลักสูตร การบริหารจัดการเพื่อพัฒนาคุณภาพการศึกษา</option>
                                                <option value="15"> อบรมระยะสั้นหลักสูตรการจัดการเรียนการสอน : IT in Teaching Process</option>
                                                <option value="14"> อบรมระยะสั้นหลักสูตรการจัดการเรียนการสอน : Reflective Thinking</option>
                                                <option value="17"> อบรมหลักสูตร Humanistic Care</option>
                                                <option value="35"> อบรมหลักสูตร การบริหารงานสู่ความสำเร็จ</option>
                                                <option value="4"> อบรมหลักสูตรการพยาบาลเฉพาะทาง สาขาการพยาบาลเวชปฏิบัติครอบครัว</option>
                                                <option value="21"> อบรมหลักสูตรการพยาบาลเฉพาะทาง สาขาเวชปฏิบัติทั่วไป (การรักษาโรคเบื้องต้น)</option>
                                                <option value="36"> อบรมหลักสูตรการพัฒนาสมรรถนะผู้นำด้านการบริหารจัดการ และทักษะการสื่อสาร ของสถาบันพระบรมราชชนก </option>
                                                <option value="20"> อบรมหลักสูตรการสอนพยาบาลในคลินิก</option>
                                                <option value="16"> อบรมหลักสูตรเฉพาะทาง สาขาการพยาบาลผู้ป่วยประสาทวิทยาและประสาทศัลยศาสตร์</option>
                                                <option value="10"> อบรมหลักสูตรผู้บริหารการสาธารณสุขระดับกลาง</option>
                                                <option value="11"> อบรมหลักสูตรผู้บริหารการสาธารณสุขระดับกลาง</option>
                                                <option value="12"> อบรมหลักสูตรผู้บริหารการสาธารณสุขระดับกลาง</option>
                                                <option value="18"> อบรมหลักสูตรผู้บริหารการสาธารณสุขระดับกลาง</option>
                                                <option value="34"> อบรมหลักสูตรผู้บริหารการสาธารณสุขระดับกลาง</option>
                                                <option value="9"> อบรมหลักสูตรผู้บริหารการสาธารณสุขระดับต้น</option>
                                                <option value="19"> อบรมหลักสูตรผู้บริหารการสาธารณสุขระดับต้น</option>
                                                <option value="33"> อบรมหลักสูตรผู้บริหารการสาธารณสุขระดับต้น</option>
                                                <option value="5"> อบรมอบรมหลักสูตรการพยาบาลเฉพาะทาง ด้านการพยาบาลผู้ป่วยแบบประคับประคอง</option>
                                                <option value="7"> อบรมอบรมหลักสูตรการพยาบาลเฉพาะทาง ด้านการพยาบาลผู้ป่วยแบบประคับประคอง</option>
                                            </select>
                                        </label>
                                    </div>


                                </div>
                                <div class="row">
                                    <div class="col-md-12" style="padding-left: 55px;">
                                        <label style="color:red;">หมายเหตุ : หากไม่มีหลักสูตรให้เลือก ให้แจ้งผู้รับผิดชอบงานพัฒนาบุคลากร เพื่อเพิ่มข้อมูลหลักสูตรก่อน</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="row">
                                    <div class="col-md-5" style="padding-left: 32px;">
                                        <label>
                                            <input type="radio" name="dev_go_service_type" value="4" class="check5 check8 check10 check12">
                                            ศึกษาดูงาน
                                        </label>
                                    </div>
                                </div>
                                <div class="row seminar_option" id="seminar_option" style="display: none;">
                                    <div class="col-md-12" style="padding-left: 55px;">
                                        <label>
                                            <input type="radio" id="inlineradio1" value="0" name="dev_study_visit"> ในประเทศ
                                        </label>
                                        <label>
                                            <input type="radio" id="inlineradio2" value="1" name="dev_study_visit"> ต่างประเทศ
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <label>
                                        <input type="radio" name="dev_go_service_type" value="3" class="check6 check7 check10">
                                        บริการวิชาการ
                                    </label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-11" style="padding-left: 40px;">
                                    <label id="academic"></label>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="row vehicle" style="padding: 10px 0px 10px 0px;">
                        <div class="row">
                            <div class="col-md-3" style="padding-left: 76px;"><b>พาหนะในการเดินทาง</b></div>
                            <div class="demo-radio-button">
                                <input name="group1" id="radio_1" type="radio" checked="">
                                <label for="radio_1">ยานพาหนะทางราชการ</label>
                                <input name="group1" id="radio_2" type="radio">
                                <label for="radio_2">ขอนุมัติเช่ารถ</label>
                                <input name="group1" class="with-gap" id="radio_3" type="radio">
                                <label for="radio_3">รถโดยสารประจำทาง</label>
                                <input name="group1" class="with-gap" id="radio_4" type="radio">
                                <label for="radio_4">รถส่วนตัว</label>
                                <input name="group2" disabled="" id="radio_5" type="radio" checked="">
                                <label for="radio_5">Radio - Disabled</label>
                                <input name="group3" disabled="" class="with-gap" id="radio_6" type="radio" checked="">
                            </div>
                        </div>
                    </div>

                    <div class="row" style="padding: 10px 0px 10px 0px;">
                        <div class="col-md-10" style="padding-left: 62px;"><b>หมายเหตุ :</b> <label style="color:red;">*</label> ต้องกรอกข้อมูลให้สมบูรณ์</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



</section>
</html>