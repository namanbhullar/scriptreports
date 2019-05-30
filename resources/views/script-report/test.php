<html>
<head>
<style type="text/css">
@page {
 sheet-size: A4;
 size: 50cm 29cm;
 odd-header-name: html_myHTMLHeaderOdd;
 odd-footer-name: html_myHTMLFooterOdd;
 margin-header: 20px;
 margin-footer: 10px;
 margin-left:30px;
 margin-right:30px;
}
body {
	font-family: sans-serif;
	font-size: 10pt;
	width:100%;
	margin:0;
	padding:0;
}
p {
	text-align:justify;
	margin:0px;
}
.clear {
	clear:both;
}
.MainDivcontainer {
	width:900px;
	float:left;
	page-break-inside:avoid;
}
.CompareGraphmain {
	float:left;
	float: left;
	margin-bottom:0px;
	margin-top:0px;
	margin-left: 0;
	padding-left: 0;
	padding-bottom:20px;
	width:100%;
}
.Reprot-compare .Compareheading {
	font-size:20px;
	font-weight:normal;
	float:left;
	background:#5b5b5b;
	color: #fff;
	margin: 0;
	padding: 8px 14px;
	width: 96%;
	border:none !important;
}
.CompareMainDiv {
	float:left;
	width:100%;
	margin-top:10px;
	padding-left:10px;
}
.Compareheading {
	font-size:20px;
	margin:5px 0px;
}
.CompareCatheading {
	width:130px;
	float:left;
	font-size:16px;
	color:#000;
	padding:4px 8px;
	font-weight:bold;
}
.Comparegraphratings {
	float:left;
	margin:14px 0px 8px 20px;
}
.Comparepass {
	font-family:Arial, Helvetica, sans-serif;
	font-weight:bold;
	float:left;
	font-size:14px;
	width:190px;
}
.Compareconsider {
	font-family:Arial, Helvetica, sans-serif;
	font-weight:bold;
	float:left;
	font-size:14px;
	width:195px;
}
.Comparerecommend {
	font-family:Arial, Helvetica, sans-serif;
	font-weight:bold;
	text-align:right;
	float:left;
	font-size:14px;
	width:115px;
}
.Comparepoor {
	font-family:Arial, Helvetica, sans-serif;
	font-weight:bold;
	float:left;
	font-size:14px;
	width:145px;
}
.Comparefair {
	font-family:Arial, Helvetica, sans-serif;
	font-weight:bold;
	float:left;
	font-size:14px;
	width:140px;
}
.Comparegood {
	font-family:Arial, Helvetica, sans-serif;
	font-weight:bold;
	text-align:left;
	float:left;
	font-size:14px;
	width:100px;
}
.Compareexcellent {
	font-family:Arial, Helvetica, sans-serif;
	font-weight:bold;
	text-align:right;
	float:left;
	font-size:14px;
	width:115px;
}
.Comparemain_graphdiv {
	float:left;
	margin-bottom:5px;
	vertical-align:middle;
}
.Comparetitle {
	float:left;
	width:146px;
	padding-right:20px;
	font-size:14px;
	text-align:right;
	padding-top:0px;
	margin:0px;
	color:#000;
}
.ComparereadBigBG {
	float:left;
	width:510px;
	height:12px;
	margin-top:2px;
	padding:2px 0px 0px 0px;
	background:none;
}
.ComparewhiteBG {
	float:left;
	width:500px;
	background:#EBEBEB;
	height:10px;
	margin-left:0px;
}
.CompareredEge {
	height:10px;
	float:left;
	padding:2px 0px;
	border-right:2px solid #BB2F30;
	margin-top:-12px;
}
.CompareredBG {
	float:left;
	background:#BB2F30;
	height:10px;
}
.CompareReader1BG {
	float:left;
	background:#32839E;
	height:10px;
}
.CompareReader1Ege {
	height:10px;
	float:left;
	padding:2px 0px;
	border-right:2px solid #32839E;
	margin-top:-12px;
}
.CompareReader2BG {
	float:left;
	background:#E0B640;
	height:10px;
}
.CompareReader2Ege {
	height:10px;
	float:left;
	padding:2px 0px;
	border-right:2px solid #E0B640;
	margin-top:-12px;
}
.CompareReader3BG {
	float:left;
	background:#A00257;
	height:10px;
}
.CompareReader3Ege {
	height:10px;
	float:left;
	padding:2px 0px;
	border-right:2px solid #A00257;
	margin-top:-12px;
}
.CompareReader4BG {
	float:left;
	background:#9D9936;
	height:10px;
}
.CompareReader4Ege {
	height:10px;
	float:left;
	padding:2px 0px;
	border-right:2px solid #9D9936;
	margin-top:-12px;
}
.CompareReader5BG {
	float:left;
	background:#E47B00;
	height:10px;
}
.CompareReader5Ege {
	height:10px;
	float:left;
	padding:2px 0px;
	border-right:2px solid #E47B00;
	margin-top:-12px;
}
.chart-heading {
	float:left;
	width:100%;
	margin-bottom:10px;
}
.chart-heading h2 {
	background:#808080;
	color:#fff;
	font-size:16px;
	width:80px;
	text-align:center
}
.Qcat-heading {
	float:left;
	width:auto;
}
.N-heading {
	float:left;
	margin-bottom:0px;
}
.no-margin {
	margin-top:0px !important;
}
.Qcat-heading h2, .N-heading h2 {
	background:#808080;
	color:#fff;
	font-size:16px;
	width:250px;
	padding:5px 10px;
	text-align:center
}
.chartdiv {
	float:left;
	width:100%;
	background:#fff;
	margin-bottom:30px;
	border:1px solid #ccc;
}
.notes {
	float:left;
	margin-bottom:30px;
}
.chart-block {
	border-bottom:1px solid #ccc;
	float:left;
}
.chart-block .cat-title {
	width:136px;
	float:left;
	padding:7px 0px;
	text-align:center;
	font-size:14px;
	color:#5B5B5B;
}
.chart-block .chart-point {
	width:84px;
	float:left;
	background:#990002;
	padding:8px 0px;
	text-align:center;
	font-weight:bold;
	color:#fff;
	margin-left:1px;
}
.chart-block .chart-avg {
	width:84px;
	float:left;
	background:#D50100;
	padding:8px 0px;
	text-align:center;
	font-weight:bold;
	color:#fff;
	margin-left:1px;
}
.chart-block .reader1 {
	width:84px;
	float:left;
	background:#32839E;
	padding:8px 0px;
	text-align:center;
	font-weight:bold;
	color:#fff;
	margin-left:1px;
}
.chart-block .reader2 {
	width:84px;
	float:left;
	background:#E0B640;
	padding:8px 0px;
	text-align:center;
	font-weight:bold;
	color:#fff;
	margin-left:1px;
}
.chart-block .reader3 {
	width:84px;
	float:left;
	background:#A00257;
	padding:8px 0px;
	text-align:center;
	font-weight:bold;
	color:#fff;
	margin-left:1px;
}
.chart-block .reader4 {
	width:84px;
	float:left;
	background:#9D9936;
	padding:8px 0px;
	text-align:center;
	font-weight:bold;
	color:#fff;
	margin-left:1px;
}
.chart-block .reader5 {
	width:84px;
	float:left;
	background:#E47B00;
	padding:8px 0px;
	text-align:center;
	font-weight:bold;
	color:#fff;
	margin-left:1px;
}
.chart-blocks {
	width:84px;
	float:left;
	padding:8px 0px;
	text-align:center;
	font-weight:bold;
	color:#5B5B5B;
	border-left:1px solid #ccc;
}
.chart-totalblock {
	background:#AFAFAF;
	float:left;
	width:100%;
}
.chart-totalblock .cat-title {
	width:133px;
	float:left;
	padding:7px 0px;
	text-align:center;
	font-size:14px;
	color:#fff;
}
.chart-totalblock .chart-blocks {
	color:#fff;
	border-left:none;
}
.QCat-div {
	float:left;
	width:100%;
	margin-top:10px;
}
.q-maindiv {
	float:left;
	width:100%;
	margin-top:0px;
}
.n-maindiv {
	float:left;
	width:100%;
}
.q-toppart {
	float:left;
	width:100%;
}
.q-title {
	float:left;
	width:80%;
	font-size:16px;
	color:#000;
	padding-top:15px;
}
.q-graph {
	float:right;
	width:55;
	border:1px solid #CCC;
	background:#EBEBEB;
	padding:5px;
	position:relative;
	line-height:10px;
}
.g-ratings {
	width:10px;
	float:left;
	height:50px;
	color:#808080;
	font-size:8px;
}
.g-blocks1 {
	margin-left:1px;
	width:30px;
	border-left:10px solid #fff;
	float:left;
	height:64px;
	margin-top:7px;
}
.g-blocks2 {
	margin-left:25px;
	width:30px;
	border-left:10px solid #fff;
	float:left;
	height:64px;
	margin-top:-64px;
}
.g-blocks3 {
	margin-left:50px;
	width:30px;
	position:absolute;
	border-left:10px solid #000;
	float:left;
	height:64px;
	margin-top:-64px;
}
.g-blocks4 {
	margin-left:75px;
	width:30px;
	border-left:10px solid #fff;
	float:left;
	height:64px;
	margin-top:-64px;
}
.g-blocks5 {
	margin-left:100px;
	width:30px;
	border-left:10px solid #fff;
	float:left;
	height:64px;
	margin-top:-64px;
}
.g-score {
	float:left;
	width:15px;
	height:13px;
	font-weight:bold;
	font-size:10px;
}
.g-reader1 {
	width:11px;
	border-left:1px solid #2D86A4;
	background:#2D86A4;
	position:absolute;
	bottom:9px;
}
.g-reader2 {
	position:absolute;
	bottom:9px;
	width:11px;
	background:#D8B456;
}
.g-reader3 {
	position:absolute;
	bottom:9px;
	width:11px;
	background:#A0005A;
}
.g-reader4 {
	position:absolute;
	bottom:9px;
	width:11px;
	background:#9B9A30;
}
.g-reader5 {
	position:absolute;
	bottom:9px;
	width:11px;
	background:#E47B00;
}
.q-details {
	float:left;
	width:100%;
}
.q-detail-div {
	width:100%;
	float:left;
}
.q-detail-reader1 h2 {
	width:100%;
	float:left;
}
.q-notes-heading {
	width:110px;
	float:left;
}
.q-notes-heading h2 {
	color: #000;
	font-size: 13px;
	padding: 5px 0px;
	text-align: left;
	width: auto;
	margin:0px;
}
.q-notes-desc {
	background:#fff;
	float:left;
	width:96%;
	padding:3px 5px 0px 5px;
	font-size:12px;
	margin-top:-1px;
}
.q-notes-reader1, .q-notes-reader2, .q-notes-reader3, .q-notes-reader4, .q-notes-reader5 {
	float:left;
	width:100%;
	margin-bottom:0px;
}
.notes-desc {
	margin-bottom:5px;
}
.q-notes-reader1 .q-notes-heading h2 {
}
.q-notes-reader1 .q-notes-desc {
	border-top:1px solid #33839C;
}
.q-notes-reader2 .q-notes-heading h2 {
/*background:#DFB441;*/
}
.q-notes-reader2 .q-notes-desc {
	border-top:1px solid #DFB441;
}
.q-notes-reader3 .q-notes-heading h2 {
/*background:#A0005A;*/
}
.q-notes-reader3 .q-notes-desc {
	border-top:1px solid #A0005A;
}
.q-notes-reader4 .q-notes-heading h2 {
/*background:#A19936;*/
}
.q-notes-reader4 .q-notes-desc {
	border-top:1px solid #A19936;
}
.q-notes-reader5 .q-notes-heading h2 {
/*background:#E37F07;*/
}
.q-notes-reader5 .q-notes-desc {
	border-top:1px solid #E37F07;
}
.bar-graph {
	float:left;
	margin-bottom:0px;
}
.scorechart, .questions {
	float:left;
}
</style>
</head>

<body>
<htmlpageheader name="myHTMLHeaderOdd" style="display:none;">
  <table width="100%" style="border-bottom:1px solid #000; margin-bottom:0px; float:left;">
    <tr>
      <td align="left" colspan="2"><p style="float:left;"> <strong style="font-size:22px;">Test by harpreet</strong> </p></td>
      <td align="right"><h4 style="float:left;width:100%;">July 28, 2016</h4></td>
    </tr>
  </table>
</htmlpageheader>
<htmlpagefooter name="myHTMLFooterOdd" style="display:none">
  <div style="color:#000; font-weight:bold; border-top:1px solid #000; padding-top:5px;" align="right"><b>{PAGENO}</b></div>
</htmlpagefooter>
<div class="MainDivcontainer">
  <div class="bar-graph">
    <div class="CompareGraphmain">
      <h3 class="Compareheading">Evalaution Graph</h3>
      <div class="CompareMainDiv">
        <div class="CompareCatheading">Script</div>
        <div class="Comparegraphratings">
          <div class="Comparepass">Pass</div>
          <div class="Compareconsider">Consider</div>
          <div class="Comparerecommend">Recommend</div>
        </div>
        <div class="clear"></div>
        <div class="Comparemain_graphdiv">
          <div class="Comparetitle">Average</div>
          <div class="ComparereadBigBG">
            <div class="ComparewhiteBG">
              <div class="CompareredBG" style="width:261.55px;"></div>
            </div>
            <div class="CompareredEge" style="width:259.55px;"></div>
          </div>
        </div>
        <div class="Comparemain_graphdiv">
          <div class="Comparetitle">Reader 1</div>
          <div class="ComparereadBigBG">
            <div class="ComparewhiteBG">
              <div class="CompareReader1BG" style="width:292.88518591772px;"></div>
            </div>
            <div class="CompareReader1Ege" style="width:290.88518591772px;"></div>
          </div>
        </div>
        <div class="Comparemain_graphdiv">
          <div class="Comparetitle">Reader 2</div>
          <div class="ComparereadBigBG">
            <div class="ComparewhiteBG">
              <div class="CompareReader2BG" style="width:230.22695806962px;"></div>
            </div>
            <div class="CompareReader2Ege" style="width:228.22695806962px;"></div>
          </div>
        </div>
      </div>
      <div class="CompareMainDiv">
        <div class="CompareCatheading">Marketablity</div>
        <div class="Comparegraphratings">
          <div class="Comparepass">Pass</div>
          <div class="Compareconsider">Consider</div>
          <div class="Comparerecommend">Recommend</div>
        </div>
        <div class="clear"></div>
        <div class="Comparemain_graphdiv">
          <div class="Comparetitle">Average</div>
          <div class="ComparereadBigBG">
            <div class="ComparewhiteBG">
              <div class="CompareredBG" style="width:257.4px;"></div>
            </div>
            <div class="CompareredEge" style="width:255.4px;"></div>
          </div>
        </div>
        <div class="Comparemain_graphdiv">
          <div class="Comparetitle">Reader 1</div>
          <div class="ComparereadBigBG">
            <div class="ComparewhiteBG">
              <div class="CompareReader1BG" style="width:256.33455300633px;"></div>
            </div>
            <div class="CompareReader1Ege" style="width:254.33455300633px;"></div>
          </div>
        </div>
        <div class="Comparemain_graphdiv">
          <div class="Comparetitle">Reader 2</div>
          <div class="ComparereadBigBG">
            <div class="ComparewhiteBG">
              <div class="CompareReader2BG" style="width:258.42316060127px;"></div>
            </div>
            <div class="CompareReader2Ege" style="width:256.42316060127px;"></div>
          </div>
        </div>
      </div>
      <div class="CompareMainDiv">
        <div class="CompareCatheading">Originality</div>
        <div class="Comparegraphratings">
          <div class="Comparepass">Pass</div>
          <div class="Compareconsider">Consider</div>
          <div class="Comparerecommend">Recommend</div>
        </div>
        <div class="clear"></div>
        <div class="Comparemain_graphdiv">
          <div class="Comparetitle">Average</div>
          <div class="ComparereadBigBG">
            <div class="ComparewhiteBG">
              <div class="CompareredBG" style="width:234.95px;"></div>
            </div>
            <div class="CompareredEge" style="width:232.95px;"></div>
          </div>
        </div>
        <div class="Comparemain_graphdiv">
          <div class="Comparetitle">Reader 1</div>
          <div class="ComparereadBigBG">
            <div class="ComparewhiteBG">
              <div class="CompareReader1BG" style="width:215.60670490506px;"></div>
            </div>
            <div class="CompareReader1Ege" style="width:213.60670490506px;"></div>
          </div>
        </div>
        <div class="Comparemain_graphdiv">
          <div class="Comparetitle">Reader 2</div>
          <div class="ComparereadBigBG">
            <div class="ComparewhiteBG">
              <div class="CompareReader2BG" style="width:254.24594541139px;"></div>
            </div>
            <div class="CompareReader2Ege" style="width:252.24594541139px;"></div>
          </div>
        </div>
      </div>
      <div class="CompareMainDiv">
        <div class="CompareCatheading">Concept</div>
        <div class="Comparegraphratings">
          <div class="Comparepass">Pass</div>
          <div class="Compareconsider">Consider</div>
          <div class="Comparerecommend">Recommend</div>
        </div>
        <div class="clear"></div>
        <div class="Comparemain_graphdiv">
          <div class="Comparetitle">Average</div>
          <div class="ComparereadBigBG">
            <div class="ComparewhiteBG">
              <div class="CompareredBG" style="width:314.3px;"></div>
            </div>
            <div class="CompareredEge" style="width:312.3px;"></div>
          </div>
        </div>
        <div class="Comparemain_graphdiv">
          <div class="Comparetitle">Reader 1</div>
          <div class="ComparereadBigBG">
            <div class="ComparewhiteBG">
              <div class="CompareReader1BG" style="width:321.08138844937px;"></div>
            </div>
            <div class="CompareReader1Ege" style="width:319.08138844937px;"></div>
          </div>
        </div>
        <div class="Comparemain_graphdiv">
          <div class="Comparetitle">Reader 2</div>
          <div class="ComparereadBigBG">
            <div class="ComparewhiteBG">
              <div class="CompareReader2BG" style="width:307.50543908228px;"></div>
            </div>
            <div class="CompareReader2Ege" style="width:305.50543908228px;"></div>
          </div>
        </div>
      </div>
      <div class="CompareMainDiv">
        <div class="CompareCatheading">Writer</div>
        <div class="Comparegraphratings">
          <div class="Comparepass">Pass</div>
          <div class="Compareconsider">Consider</div>
          <div class="Comparerecommend">Recommend</div>
        </div>
        <div class="clear"></div>
        <div class="Comparemain_graphdiv">
          <div class="Comparetitle">Average</div>
          <div class="ComparereadBigBG">
            <div class="ComparewhiteBG">
              <div class="CompareredBG" style="width:297.05px;"></div>
            </div>
            <div class="CompareredEge" style="width:295.05px;"></div>
          </div>
        </div>
        <div class="Comparemain_graphdiv">
          <div class="Comparetitle">Reader 1</div>
          <div class="ComparereadBigBG">
            <div class="ComparewhiteBG">
              <div class="CompareReader1BG" style="width:312.72695806962px;"></div>
            </div>
            <div class="CompareReader1Ege" style="width:310.72695806962px;"></div>
          </div>
        </div>
        <div class="Comparemain_graphdiv">
          <div class="Comparetitle">Reader 2</div>
          <div class="ComparereadBigBG">
            <div class="ComparewhiteBG">
              <div class="CompareReader2BG" style="width:281.39784414557px;"></div>
            </div>
            <div class="CompareReader2Ege" style="width:279.39784414557px;"></div>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Question part -->
    <div class="CompareGraphmain">
      <h3 class="Compareheading">Questions Graph</h3>
      <div class="CompareMainDiv">
        <div class="CompareCatheading">First Ten Pages</div>
        <div class="Comparegraphratings">
          <div class="Comparepoor">Poor</div>
          <div class="Comparefair">Fair</div>
          <div class="Comparegood">Good</div>
          <div class="Compareexcellent">Excellent</div>
        </div>
        <div class="clear"></div>
        <div class="Comparemain_graphdiv">
          <div class="Comparetitle">Average</div>
          <div class="ComparereadBigBG">
            <div class="ComparewhiteBG">
              <div class="CompareredBG" style="width:328.57142857143px;"></div>
            </div>
            <div class="CompareredEge" style="width:326.57142857143px;"></div>
          </div>
        </div>
        <div class="Comparemain_graphdiv">
          <div class="Comparetitle">Reader 1</div>
          <div class="ComparereadBigBG">
            <div class="ComparewhiteBG">
              <div class="CompareReader1BG" style="width:328.57142857143px;"></div>
            </div>
            <div class="CompareReader1Ege" style="width:326.57142857143px;"></div>
          </div>
        </div>
        <div class="Comparemain_graphdiv">
          <div class="Comparetitle">Reader 2</div>
          <div class="ComparereadBigBG">
            <div class="ComparewhiteBG">
              <div class="CompareReader2BG" style="width:328.57142857143px;"></div>
            </div>
            <div class="CompareReader2Ege" style="width:326.57142857143px;"></div>
          </div>
        </div>
      </div>
      <div class="CompareMainDiv">
        <div class="CompareCatheading">Character</div>
        <div class="Comparegraphratings">
          <div class="Comparepoor">Poor</div>
          <div class="Comparefair">Fair</div>
          <div class="Comparegood">Good</div>
          <div class="Compareexcellent">Excellent</div>
        </div>
        <div class="clear"></div>
        <div class="Comparemain_graphdiv">
          <div class="Comparetitle">Average</div>
          <div class="ComparereadBigBG">
            <div class="ComparewhiteBG">
              <div class="CompareredBG" style="width:320px;"></div>
            </div>
            <div class="CompareredEge" style="width:318px;"></div>
          </div>
        </div>
        <div class="Comparemain_graphdiv">
          <div class="Comparetitle">Reader 1</div>
          <div class="ComparereadBigBG">
            <div class="ComparewhiteBG">
              <div class="CompareReader1BG" style="width:320px;"></div>
            </div>
            <div class="CompareReader1Ege" style="width:318px;"></div>
          </div>
        </div>
        <div class="Comparemain_graphdiv">
          <div class="Comparetitle">Reader 2</div>
          <div class="ComparereadBigBG">
            <div class="ComparewhiteBG">
              <div class="CompareReader2BG" style="width:320px;"></div>
            </div>
            <div class="CompareReader2Ege" style="width:318px;"></div>
          </div>
        </div>
      </div>
      <div class="CompareMainDiv">
        <div class="CompareCatheading">Emotional Response</div>
        <div class="Comparegraphratings">
          <div class="Comparepoor">Poor</div>
          <div class="Comparefair">Fair</div>
          <div class="Comparegood">Good</div>
          <div class="Compareexcellent">Excellent</div>
        </div>
        <div class="clear"></div>
        <div class="Comparemain_graphdiv">
          <div class="Comparetitle">Average</div>
          <div class="ComparereadBigBG">
            <div class="ComparewhiteBG">
              <div class="CompareredBG" style="width:308.33333333333px;"></div>
            </div>
            <div class="CompareredEge" style="width:306.33333333333px;"></div>
          </div>
        </div>
        <div class="Comparemain_graphdiv">
          <div class="Comparetitle">Reader 1</div>
          <div class="ComparereadBigBG">
            <div class="ComparewhiteBG">
              <div class="CompareReader1BG" style="width:300px;"></div>
            </div>
            <div class="CompareReader1Ege" style="width:298px;"></div>
          </div>
        </div>
        <div class="Comparemain_graphdiv">
          <div class="Comparetitle">Reader 2</div>
          <div class="ComparereadBigBG">
            <div class="ComparewhiteBG">
              <div class="CompareReader2BG" style="width:316.66666666667px;"></div>
            </div>
            <div class="CompareReader2Ege" style="width:314.66666666667px;"></div>
          </div>
        </div>
      </div>
      <div class="CompareMainDiv">
        <div class="CompareCatheading">Theme</div>
        <div class="Comparegraphratings">
          <div class="Comparepoor">Poor</div>
          <div class="Comparefair">Fair</div>
          <div class="Comparegood">Good</div>
          <div class="Compareexcellent">Excellent</div>
        </div>
        <div class="clear"></div>
        <div class="Comparemain_graphdiv">
          <div class="Comparetitle">Average</div>
          <div class="ComparereadBigBG">
            <div class="ComparewhiteBG">
              <div class="CompareredBG" style="width:340px;"></div>
            </div>
            <div class="CompareredEge" style="width:338px;"></div>
          </div>
        </div>
        <div class="Comparemain_graphdiv">
          <div class="Comparetitle">Reader 1</div>
          <div class="ComparereadBigBG">
            <div class="ComparewhiteBG">
              <div class="CompareReader1BG" style="width:320px;"></div>
            </div>
            <div class="CompareReader1Ege" style="width:318px;"></div>
          </div>
        </div>
        <div class="Comparemain_graphdiv">
          <div class="Comparetitle">Reader 2</div>
          <div class="ComparereadBigBG">
            <div class="ComparewhiteBG">
              <div class="CompareReader2BG" style="width:360px;"></div>
            </div>
            <div class="CompareReader2Ege" style="width:358px;"></div>
          </div>
        </div>
      </div>
      <div class="CompareMainDiv">
        <div class="CompareCatheading">Marketability</div>
        <div class="Comparegraphratings">
          <div class="Comparepoor">Poor</div>
          <div class="Comparefair">Fair</div>
          <div class="Comparegood">Good</div>
          <div class="Compareexcellent">Excellent</div>
        </div>
        <div class="clear"></div>
        <div class="Comparemain_graphdiv">
          <div class="Comparetitle">Average</div>
          <div class="ComparereadBigBG">
            <div class="ComparewhiteBG">
              <div class="CompareredBG" style="width:341.66666666667px;"></div>
            </div>
            <div class="CompareredEge" style="width:339.66666666667px;"></div>
          </div>
        </div>
        <div class="Comparemain_graphdiv">
          <div class="Comparetitle">Reader 1</div>
          <div class="ComparereadBigBG">
            <div class="ComparewhiteBG">
              <div class="CompareReader1BG" style="width:333.33333333333px;"></div>
            </div>
            <div class="CompareReader1Ege" style="width:331.33333333333px;"></div>
          </div>
        </div>
        <div class="Comparemain_graphdiv">
          <div class="Comparetitle">Reader 2</div>
          <div class="ComparereadBigBG">
            <div class="ComparewhiteBG">
              <div class="CompareReader2BG" style="width:350px;"></div>
            </div>
            <div class="CompareReader2Ege" style="width:348px;"></div>
          </div>
        </div>
      </div>
      <div class="CompareMainDiv">
        <div class="CompareCatheading">Dialogue</div>
        <div class="Comparegraphratings">
          <div class="Comparepoor">Poor</div>
          <div class="Comparefair">Fair</div>
          <div class="Comparegood">Good</div>
          <div class="Compareexcellent">Excellent</div>
        </div>
        <div class="clear"></div>
        <div class="Comparemain_graphdiv">
          <div class="Comparetitle">Average</div>
          <div class="ComparereadBigBG">
            <div class="ComparewhiteBG">
              <div class="CompareredBG" style="width:337.5px;"></div>
            </div>
            <div class="CompareredEge" style="width:335.5px;"></div>
          </div>
        </div>
        <div class="Comparemain_graphdiv">
          <div class="Comparetitle">Reader 1</div>
          <div class="ComparereadBigBG">
            <div class="ComparewhiteBG">
              <div class="CompareReader1BG" style="width:325px;"></div>
            </div>
            <div class="CompareReader1Ege" style="width:323px;"></div>
          </div>
        </div>
        <div class="Comparemain_graphdiv">
          <div class="Comparetitle">Reader 2</div>
          <div class="ComparereadBigBG">
            <div class="ComparewhiteBG">
              <div class="CompareReader2BG" style="width:350px;"></div>
            </div>
            <div class="CompareReader2Ege" style="width:348px;"></div>
          </div>
        </div>
      </div>
      <div class="CompareMainDiv">
        <div class="CompareCatheading">Structure</div>
        <div class="Comparegraphratings">
          <div class="Comparepoor">Poor</div>
          <div class="Comparefair">Fair</div>
          <div class="Comparegood">Good</div>
          <div class="Compareexcellent">Excellent</div>
        </div>
        <div class="clear"></div>
        <div class="Comparemain_graphdiv">
          <div class="Comparetitle">Average</div>
          <div class="ComparereadBigBG">
            <div class="ComparewhiteBG">
              <div class="CompareredBG" style="width:341.66666666667px;"></div>
            </div>
            <div class="CompareredEge" style="width:339.66666666667px;"></div>
          </div>
        </div>
        <div class="Comparemain_graphdiv">
          <div class="Comparetitle">Reader 1</div>
          <div class="ComparereadBigBG">
            <div class="ComparewhiteBG">
              <div class="CompareReader1BG" style="width:350px;"></div>
            </div>
            <div class="CompareReader1Ege" style="width:348px;"></div>
          </div>
        </div>
        <div class="Comparemain_graphdiv">
          <div class="Comparetitle">Reader 2</div>
          <div class="ComparereadBigBG">
            <div class="ComparewhiteBG">
              <div class="CompareReader2BG" style="width:333.33333333333px;"></div>
            </div>
            <div class="CompareReader2Ege" style="width:331.33333333333px;"></div>
          </div>
        </div>
      </div>
      <div class="CompareMainDiv">
        <div class="CompareCatheading">Ending</div>
        <div class="Comparegraphratings">
          <div class="Comparepoor">Poor</div>
          <div class="Comparefair">Fair</div>
          <div class="Comparegood">Good</div>
          <div class="Compareexcellent">Excellent</div>
        </div>
        <div class="clear"></div>
        <div class="Comparemain_graphdiv">
          <div class="Comparetitle">Average</div>
          <div class="ComparereadBigBG">
            <div class="ComparewhiteBG">
              <div class="CompareredBG" style="width:328.57142857143px;"></div>
            </div>
            <div class="CompareredEge" style="width:326.57142857143px;"></div>
          </div>
        </div>
        <div class="Comparemain_graphdiv">
          <div class="Comparetitle">Reader 1</div>
          <div class="ComparereadBigBG">
            <div class="ComparewhiteBG">
              <div class="CompareReader1BG" style="width:314.28571428571px;"></div>
            </div>
            <div class="CompareReader1Ege" style="width:312.28571428571px;"></div>
          </div>
        </div>
        <div class="Comparemain_graphdiv">
          <div class="Comparetitle">Reader 2</div>
          <div class="ComparereadBigBG">
            <div class="ComparewhiteBG">
              <div class="CompareReader2BG" style="width:342.85714285714px;"></div>
            </div>
            <div class="CompareReader2Ege" style="width:340.85714285714px;"></div>
          </div>
        </div>
      </div>
      <div class="CompareMainDiv">
        <div class="CompareCatheading">Pacing</div>
        <div class="Comparegraphratings">
          <div class="Comparepoor">Poor</div>
          <div class="Comparefair">Fair</div>
          <div class="Comparegood">Good</div>
          <div class="Compareexcellent">Excellent</div>
        </div>
        <div class="clear"></div>
        <div class="Comparemain_graphdiv">
          <div class="Comparetitle">Average</div>
          <div class="ComparereadBigBG">
            <div class="ComparewhiteBG">
              <div class="CompareredBG" style="width:310px;"></div>
            </div>
            <div class="CompareredEge" style="width:308px;"></div>
          </div>
        </div>
        <div class="Comparemain_graphdiv">
          <div class="Comparetitle">Reader 1</div>
          <div class="ComparereadBigBG">
            <div class="ComparewhiteBG">
              <div class="CompareReader1BG" style="width:320px;"></div>
            </div>
            <div class="CompareReader1Ege" style="width:318px;"></div>
          </div>
        </div>
        <div class="Comparemain_graphdiv">
          <div class="Comparetitle">Reader 2</div>
          <div class="ComparereadBigBG">
            <div class="ComparewhiteBG">
              <div class="CompareReader2BG" style="width:300px;"></div>
            </div>
            <div class="CompareReader2Ege" style="width:298px;"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="scorechart">
    <div class="chart-heading">
      <h3 class="Compareheading">Score</h3>
    </div>
    <div class="chartdiv">
      <div class="chart-block">
        <div class="cat-title">&nbsp;</div>
        <div class="chart-point">Points</div>
        <div class="chart-avg">Average</div>
        <div class="reader1">Reader 1</div>
        <div class="reader2">Reader 2</div>
        <div class="reader3">Reader 3</div>
        <div class="reader4">Reader 4</div>
        <div class="reader5">Reader 5</div>
      </div>
      <div class="chart-block">
        <div class="cat-title">First Ten Pages</div>
        <div class="chart-blocks">35</div>
        <div class="chart-blocks">23</div>
        <div class="chart-blocks">23</div>
        <div class="chart-blocks">23</div>
        <div class="chart-blocks">-</div>
        <div class="chart-blocks">-</div>
        <div class="chart-blocks">-</div>
      </div>
      <div class="chart-block">
        <div class="cat-title">Character</div>
        <div class="chart-blocks">25</div>
        <div class="chart-blocks">16</div>
        <div class="chart-blocks">16</div>
        <div class="chart-blocks">16</div>
        <div class="chart-blocks">-</div>
        <div class="chart-blocks">-</div>
        <div class="chart-blocks">-</div>
      </div>
      <div class="chart-block">
        <div class="cat-title">Emotional Response</div>
        <div class="chart-blocks">30</div>
        <div class="chart-blocks">18.50</div>
        <div class="chart-blocks">18</div>
        <div class="chart-blocks">19</div>
        <div class="chart-blocks">-</div>
        <div class="chart-blocks">-</div>
        <div class="chart-blocks">-</div>
      </div>
      <div class="chart-block">
        <div class="cat-title">Theme</div>
        <div class="chart-blocks">25</div>
        <div class="chart-blocks">17</div>
        <div class="chart-blocks">16</div>
        <div class="chart-blocks">18</div>
        <div class="chart-blocks">-</div>
        <div class="chart-blocks">-</div>
        <div class="chart-blocks">-</div>
      </div>
      <div class="chart-block">
        <div class="cat-title">Marketability</div>
        <div class="chart-blocks">30</div>
        <div class="chart-blocks">20.50</div>
        <div class="chart-blocks">20</div>
        <div class="chart-blocks">21</div>
        <div class="chart-blocks">-</div>
        <div class="chart-blocks">-</div>
        <div class="chart-blocks">-</div>
      </div>
      <div class="chart-block">
        <div class="cat-title">Dialogue</div>
        <div class="chart-blocks">20</div>
        <div class="chart-blocks">13.50</div>
        <div class="chart-blocks">13</div>
        <div class="chart-blocks">14</div>
        <div class="chart-blocks">-</div>
        <div class="chart-blocks">-</div>
        <div class="chart-blocks">-</div>
      </div>
      <div class="chart-block">
        <div class="cat-title">Structure</div>
        <div class="chart-blocks">30</div>
        <div class="chart-blocks">20.50</div>
        <div class="chart-blocks">21</div>
        <div class="chart-blocks">20</div>
        <div class="chart-blocks">-</div>
        <div class="chart-blocks">-</div>
        <div class="chart-blocks">-</div>
      </div>
      <div class="chart-block">
        <div class="cat-title">Ending</div>
        <div class="chart-blocks">35</div>
        <div class="chart-blocks">23</div>
        <div class="chart-blocks">22</div>
        <div class="chart-blocks">24</div>
        <div class="chart-blocks">-</div>
        <div class="chart-blocks">-</div>
        <div class="chart-blocks">-</div>
      </div>
      <div class="chart-block">
        <div class="cat-title">Pacing</div>
        <div class="chart-blocks">25</div>
        <div class="chart-blocks">15.50</div>
        <div class="chart-blocks">16</div>
        <div class="chart-blocks">15</div>
        <div class="chart-blocks">-</div>
        <div class="chart-blocks">-</div>
        <div class="chart-blocks">-</div>
      </div>
      <div class="chart-totalblock">
        <div class="cat-title">Total</div>
        <div class="chart-blocks">255</div>
        <div class="chart-blocks"> 167.5 </div>
        <div class="chart-blocks">165</div>
        <div class="chart-blocks">170</div>
        <div class="chart-blocks">-</div>
        <div class="chart-blocks">-</div>
        <div class="chart-blocks">-</div>
      </div>
    </div>
  </div>
  <div class="notes">
    <div class="chart-heading">
      <h3 class="Compareheading" style="margin-bottom:0px;">Notes</h3>
    </div>
    <div class="QCat-div no-margin">
      <table style="float:left; margin-left:-2px; margin-bottom:5px; margin-top:10px;">
        <tr>
          <td style="color:#000; font-size:14px; font-weight:bold; padding:6px 0px;">Writing Ability</td>
        </tr>
      </table>
      <div class="clear"></div>
      <div class="q-notes-reader1 notes-desc">
        <div class="q-notes-heading">
          <h2>Reader 1</h2>
        </div>
        <div class="q-notes-desc">
          <p><span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span></p>
        </div>
      </div>
      <div class="q-notes-reader2 notes-desc">
        <div class="q-notes-heading">
          <h2>Reader 2</h2>
        </div>
        <div class="q-notes-desc">
          <p><span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span></p>
        </div>
      </div>
    </div>
    <div class="QCat-div ">
      <table style="float:left; margin-left:-2px; margin-bottom:5px; margin-top:10px;">
        <tr>
          <td style="color:#000; font-size:14px; font-weight:bold; padding:6px 0px;">Marketability</td>
        </tr>
      </table>
      <div class="clear"></div>
      <div class="q-notes-reader1 notes-desc">
        <div class="q-notes-heading">
          <h2>Reader 1</h2>
        </div>
        <div class="q-notes-desc">
          <p><span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span></p>
        </div>
      </div>
      <div class="q-notes-reader2 notes-desc">
        <div class="q-notes-heading">
          <h2>Reader 2</h2>
        </div>
        <div class="q-notes-desc">
          <p><span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span></p>
        </div>
      </div>
    </div>
    <div class="QCat-div ">
      <table style="float:left; margin-left:-2px; margin-bottom:5px; margin-top:10px;">
        <tr>
          <td style="color:#000; font-size:14px; font-weight:bold; padding:6px 0px;">Originality</td>
        </tr>
      </table>
      <div class="clear"></div>
      <div class="q-notes-reader1 notes-desc">
        <div class="q-notes-heading">
          <h2>Reader 1</h2>
        </div>
        <div class="q-notes-desc">
          <p><span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span></p>
        </div>
      </div>
      <div class="q-notes-reader2 notes-desc">
        <div class="q-notes-heading">
          <h2>Reader 2</h2>
        </div>
        <div class="q-notes-desc">
          <p><span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span></p>
        </div>
      </div>
    </div>
    <div class="QCat-div ">
      <table style="float:left; margin-left:-2px; margin-bottom:5px; margin-top:10px;">
        <tr>
          <td style="color:#000; font-size:14px; font-weight:bold; padding:6px 0px;">Suggestions for Improvements</td>
        </tr>
      </table>
      <div class="clear"></div>
      <div class="q-notes-reader1 notes-desc">
        <div class="q-notes-heading">
          <h2>Reader 1</h2>
        </div>
        <div class="q-notes-desc">
          <p><span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span></p>
        </div>
      </div>
      <div class="q-notes-reader2 notes-desc">
        <div class="q-notes-heading">
          <h2>Reader 2</h2>
        </div>
        <div class="q-notes-desc">
          <p><span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span></p>
        </div>
      </div>
    </div>
    <div class="QCat-div ">
      <table style="float:left; margin-left:-2px; margin-bottom:5px; margin-top:10px;">
        <tr>
          <td style="color:#000; font-size:14px; font-weight:bold; padding:6px 0px;">Overall Notes</td>
        </tr>
      </table>
      <div class="clear"></div>
      <div class="q-notes-reader1 notes-desc">
        <div class="q-notes-heading">
          <h2>Reader 1</h2>
        </div>
        <div class="q-notes-desc">
          <p><span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span></p>
        </div>
      </div>
      <div class="q-notes-reader2 notes-desc">
        <div class="q-notes-heading">
          <h2>Reader 2</h2>
        </div>
        <div class="q-notes-desc">
          <p><span>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</span></p>
        </div>
      </div>
    </div>
  </div>
  <div class="questions">
    <div class="chart-heading">
      <h3 class="Compareheading">Questions</h3>
    </div>
    <div class="QCat-div no-margin">
      <table style="float:left; margin-left:-2px; margin-bottom:10px;">
        <tr>
          <td style="color:#000; font-size:14px; font-weight:bold; padding:6px 0px;">First Ten Pages</td>
        </tr>
      </table>
      <div class="clear"></div>
      <div class="q-maindiv" style="margin-bottom:10px;">
        <div class="q-toppart">
          <div class="q-title"> 1. Did the opening grab your attention and make you want to read further? </div>
          <div class="q-graph">
            <div class="g-ratings" style="line-height:9px;"> 5&nbsp;-<br>
              4&nbsp;-<br>
              3&nbsp;-<br>
              2&nbsp;-<br>
              1&nbsp;-<br>
            </div>
            <table style="float:left; width:50px; margin-left:12px; margin-top:3px;padding:0px;" cellpadding="0">
              <tr>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#32839E; width:8px; height:19px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#E0B640; width:8px; height:38px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
              </tr>
            </table>
          </div>
        </div>
        <div class="q-details">
          <div class="q-detail-div">
            <div class="q-notes-reader1">
              <div class="q-notes-heading">
                <h2>Reader 1</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
                <b>Suggestion:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
            <div class="q-notes-reader2">
              <div class="q-notes-heading">
                <h2>Reader 2</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="q-maindiv" style="margin-bottom:10px;">
        <div class="q-toppart">
          <div class="q-title"> 2. Is there a strong hook that captures your interest? </div>
          <div class="q-graph">
            <div class="g-ratings" style="line-height:9px;"> 5&nbsp;-<br>
              4&nbsp;-<br>
              3&nbsp;-<br>
              2&nbsp;-<br>
              1&nbsp;-<br>
            </div>
            <table style="float:left; width:50px; margin-left:12px; margin-top:3px;padding:0px;" cellpadding="0">
              <tr>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#32839E; width:8px; height:28px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#E0B640; width:8px; height:28px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
              </tr>
            </table>
          </div>
        </div>
        <div class="q-details">
          <div class="q-detail-div">
            <div class="q-notes-reader1">
              <div class="q-notes-heading">
                <h2>Reader 1</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
            <div class="q-notes-reader2">
              <div class="q-notes-heading">
                <h2>Reader 2</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="q-maindiv" style="margin-bottom:10px;">
        <div class="q-toppart">
          <div class="q-title"> 3. Are the time and place where the story occurs clearly established? </div>
          <div class="q-graph">
            <div class="g-ratings" style="line-height:9px;"> 5&nbsp;-<br>
              4&nbsp;-<br>
              3&nbsp;-<br>
              2&nbsp;-<br>
              1&nbsp;-<br>
            </div>
            <table style="float:left; width:50px; margin-left:12px; margin-top:3px;padding:0px;" cellpadding="0">
              <tr>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#32839E; width:8px; height:28px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#E0B640; width:8px; height:28px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
              </tr>
            </table>
          </div>
        </div>
        <div class="q-details">
          <div class="q-detail-div">
            <div class="q-notes-reader1">
              <div class="q-notes-heading">
                <h2>Reader 1</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
            <div class="q-notes-reader2">
              <div class="q-notes-heading">
                <h2>Reader 2</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="q-maindiv" style="margin-bottom:10px;">
        <div class="q-toppart">
          <div class="q-title"> 4. Can you identify with the characters? </div>
          <div class="q-graph">
            <div class="g-ratings" style="line-height:9px;"> 5&nbsp;-<br>
              4&nbsp;-<br>
              3&nbsp;-<br>
              2&nbsp;-<br>
              1&nbsp;-<br>
            </div>
            <table style="float:left; width:50px; margin-left:12px; margin-top:3px;padding:0px;" cellpadding="0">
              <tr>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#32839E; width:8px; height:38px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#E0B640; width:8px; height:28px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
              </tr>
            </table>
          </div>
        </div>
        <div class="q-details">
          <div class="q-detail-div">
            <div class="q-notes-reader1">
              <div class="q-notes-heading">
                <h2>Reader 1</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
            <div class="q-notes-reader2">
              <div class="q-notes-heading">
                <h2>Reader 2</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="q-maindiv" style="margin-bottom:10px;">
        <div class="q-toppart">
          <div class="q-title"> 5. Is the dialogue of each character distinct? </div>
          <div class="q-graph">
            <div class="g-ratings" style="line-height:9px;"> 5&nbsp;-<br>
              4&nbsp;-<br>
              3&nbsp;-<br>
              2&nbsp;-<br>
              1&nbsp;-<br>
            </div>
            <table style="float:left; width:50px; margin-left:12px; margin-top:3px;padding:0px;" cellpadding="0">
              <tr>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#32839E; width:8px; height:28px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#E0B640; width:8px; height:28px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
              </tr>
            </table>
          </div>
        </div>
        <div class="q-details">
          <div class="q-detail-div">
            <div class="q-notes-reader1">
              <div class="q-notes-heading">
                <h2>Reader 1</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
            <div class="q-notes-reader2">
              <div class="q-notes-heading">
                <h2>Reader 2</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="q-maindiv" style="margin-bottom:10px;">
        <div class="q-toppart">
          <div class="q-title"> 6. Is a theme indicated? </div>
          <div class="q-graph">
            <div class="g-ratings" style="line-height:9px;"> 5&nbsp;-<br>
              4&nbsp;-<br>
              3&nbsp;-<br>
              2&nbsp;-<br>
              1&nbsp;-<br>
            </div>
            <table style="float:left; width:50px; margin-left:12px; margin-top:3px;padding:0px;" cellpadding="0">
              <tr>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#32839E; width:8px; height:38px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#E0B640; width:8px; height:38px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
              </tr>
            </table>
          </div>
        </div>
        <div class="q-details">
          <div class="q-detail-div">
            <div class="q-notes-reader1">
              <div class="q-notes-heading">
                <h2>Reader 1</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
            <div class="q-notes-reader2">
              <div class="q-notes-heading">
                <h2>Reader 2</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="q-maindiv" style="margin-bottom:10px;">
        <div class="q-toppart">
          <div class="q-title"> 7. Is the script a page turner? </div>
          <div class="q-graph">
            <div class="g-ratings" style="line-height:9px;"> 5&nbsp;-<br>
              4&nbsp;-<br>
              3&nbsp;-<br>
              2&nbsp;-<br>
              1&nbsp;-<br>
            </div>
            <table style="float:left; width:50px; margin-left:12px; margin-top:3px;padding:0px;" cellpadding="0">
              <tr>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#32839E; width:8px; height:38px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#E0B640; width:8px; height:28px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
              </tr>
            </table>
          </div>
        </div>
        <div class="q-details">
          <div class="q-detail-div">
            <div class="q-notes-reader1">
              <div class="q-notes-heading">
                <h2>Reader 1</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
            <div class="q-notes-reader2">
              <div class="q-notes-heading">
                <h2>Reader 2</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="QCat-div ">
      <table style="float:left; margin-left:-2px; margin-bottom:10px;">
        <tr>
          <td style="color:#000; font-size:14px; font-weight:bold; padding:6px 0px;">Character</td>
        </tr>
      </table>
      <div class="clear"></div>
      <div class="q-maindiv" style="margin-bottom:10px;">
        <div class="q-toppart">
          <div class="q-title"> 1. Do you like the main character? </div>
          <div class="q-graph">
            <div class="g-ratings" style="line-height:9px;"> 5&nbsp;-<br>
              4&nbsp;-<br>
              3&nbsp;-<br>
              2&nbsp;-<br>
              1&nbsp;-<br>
            </div>
            <table style="float:left; width:50px; margin-left:12px; margin-top:3px;padding:0px;" cellpadding="0">
              <tr>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#32839E; width:8px; height:28px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#E0B640; width:8px; height:19px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
              </tr>
            </table>
          </div>
        </div>
        <div class="q-details">
          <div class="q-detail-div">
            <div class="q-notes-reader1">
              <div class="q-notes-heading">
                <h2>Reader 1</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
            <div class="q-notes-reader2">
              <div class="q-notes-heading">
                <h2>Reader 2</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="q-maindiv" style="margin-bottom:10px;">
        <div class="q-toppart">
          <div class="q-title"> 2. Does the protagonist have a clear and compelling goal or "want"? </div>
          <div class="q-graph">
            <div class="g-ratings" style="line-height:9px;"> 5&nbsp;-<br>
              4&nbsp;-<br>
              3&nbsp;-<br>
              2&nbsp;-<br>
              1&nbsp;-<br>
            </div>
            <table style="float:left; width:50px; margin-left:12px; margin-top:3px;padding:0px;" cellpadding="0">
              <tr>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#32839E; width:8px; height:38px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#E0B640; width:8px; height:28px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
              </tr>
            </table>
          </div>
        </div>
        <div class="q-details">
          <div class="q-detail-div">
            <div class="q-notes-reader1">
              <div class="q-notes-heading">
                <h2>Reader 1</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="q-maindiv" style="margin-bottom:10px;">
        <div class="q-toppart">
          <div class="q-title"> 3. Does the script have roles that actors will want to play? </div>
          <div class="q-graph">
            <div class="g-ratings" style="line-height:9px;"> 5&nbsp;-<br>
              4&nbsp;-<br>
              3&nbsp;-<br>
              2&nbsp;-<br>
              1&nbsp;-<br>
            </div>
            <table style="float:left; width:50px; margin-left:12px; margin-top:3px;padding:0px;" cellpadding="0">
              <tr>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#32839E; width:8px; height:28px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#E0B640; width:8px; height:38px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
              </tr>
            </table>
          </div>
        </div>
        <div class="q-details">
          <div class="q-detail-div">
            <div class="q-notes-reader1">
              <div class="q-notes-heading">
                <h2>Reader 1</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
            <div class="q-notes-reader2">
              <div class="q-notes-heading">
                <h2>Reader 2</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="q-maindiv" style="margin-bottom:10px;">
        <div class="q-toppart">
          <div class="q-title"> 4. Does the protagonist have a character flaw? </div>
          <div class="q-graph">
            <div class="g-ratings" style="line-height:9px;"> 5&nbsp;-<br>
              4&nbsp;-<br>
              3&nbsp;-<br>
              2&nbsp;-<br>
              1&nbsp;-<br>
            </div>
            <table style="float:left; width:50px; margin-left:12px; margin-top:3px;padding:0px;" cellpadding="0">
              <tr>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#32839E; width:8px; height:28px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#E0B640; width:8px; height:28px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
              </tr>
            </table>
          </div>
        </div>
        <div class="q-details">
          <div class="q-detail-div">
            <div class="q-notes-reader1">
              <div class="q-notes-heading">
                <h2>Reader 1</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
            <div class="q-notes-reader2">
              <div class="q-notes-heading">
                <h2>Reader 2</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="q-maindiv" style="margin-bottom:10px;">
        <div class="q-toppart">
          <div class="q-title"> 5. Can you relate to the antagonist's motives even though they may not be acceptable? </div>
          <div class="q-graph">
            <div class="g-ratings" style="line-height:9px;"> 5&nbsp;-<br>
              4&nbsp;-<br>
              3&nbsp;-<br>
              2&nbsp;-<br>
              1&nbsp;-<br>
            </div>
            <table style="float:left; width:50px; margin-left:12px; margin-top:3px;padding:0px;" cellpadding="0">
              <tr>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#32839E; width:8px; height:28px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#E0B640; width:8px; height:38px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
              </tr>
            </table>
          </div>
        </div>
        <div class="q-details">
          <div class="q-detail-div">
            <div class="q-notes-reader1">
              <div class="q-notes-heading">
                <h2>Reader 1</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
            <div class="q-notes-reader2">
              <div class="q-notes-heading">
                <h2>Reader 2</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="QCat-div ">
      <table style="float:left; margin-left:-2px; margin-bottom:10px;">
        <tr>
          <td style="color:#000; font-size:14px; font-weight:bold; padding:6px 0px;">Emotional Response</td>
        </tr>
      </table>
      <div class="clear"></div>
      <div class="q-maindiv" style="margin-bottom:10px;">
        <div class="q-toppart">
          <div class="q-title"> 1. Does the story evoke an emotional response? </div>
          <div class="q-graph">
            <div class="g-ratings" style="line-height:9px;"> 5&nbsp;-<br>
              4&nbsp;-<br>
              3&nbsp;-<br>
              2&nbsp;-<br>
              1&nbsp;-<br>
            </div>
            <table style="float:left; width:50px; margin-left:12px; margin-top:3px;padding:0px;" cellpadding="0">
              <tr>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#32839E; width:8px; height:28px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#E0B640; width:8px; height:38px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
              </tr>
            </table>
          </div>
        </div>
        <div class="q-details">
          <div class="q-detail-div">
            <div class="q-notes-reader1">
              <div class="q-notes-heading">
                <h2>Reader 1</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
            <div class="q-notes-reader2">
              <div class="q-notes-heading">
                <h2>Reader 2</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="q-maindiv" style="margin-bottom:10px;">
        <div class="q-toppart">
          <div class="q-title"> 2. Do you feel a wide range of emotions as you read the script? </div>
          <div class="q-graph">
            <div class="g-ratings" style="line-height:9px;"> 5&nbsp;-<br>
              4&nbsp;-<br>
              3&nbsp;-<br>
              2&nbsp;-<br>
              1&nbsp;-<br>
            </div>
            <table style="float:left; width:50px; margin-left:12px; margin-top:3px;padding:0px;" cellpadding="0">
              <tr>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#32839E; width:8px; height:28px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#E0B640; width:8px; height:28px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
              </tr>
            </table>
          </div>
        </div>
        <div class="q-details">
          <div class="q-detail-div">
            <div class="q-notes-reader1">
              <div class="q-notes-heading">
                <h2>Reader 1</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
            <div class="q-notes-reader2">
              <div class="q-notes-heading">
                <h2>Reader 2</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="q-maindiv" style="margin-bottom:10px;">
        <div class="q-toppart">
          <div class="q-title"> 3. Does the script take you on an emotional rollercoaster ride? </div>
          <div class="q-graph">
            <div class="g-ratings" style="line-height:9px;"> 5&nbsp;-<br>
              4&nbsp;-<br>
              3&nbsp;-<br>
              2&nbsp;-<br>
              1&nbsp;-<br>
            </div>
            <table style="float:left; width:50px; margin-left:12px; margin-top:3px;padding:0px;" cellpadding="0">
              <tr>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#32839E; width:8px; height:28px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#E0B640; width:8px; height:19px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
              </tr>
            </table>
          </div>
        </div>
        <div class="q-details">
          <div class="q-detail-div">
            <div class="q-notes-reader1">
              <div class="q-notes-heading">
                <h2>Reader 1</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
            <div class="q-notes-reader2">
              <div class="q-notes-heading">
                <h2>Reader 2</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="q-maindiv" style="margin-bottom:10px;">
        <div class="q-toppart">
          <div class="q-title"> 4. Do the protagonist's emotions shift and change in each scene? </div>
          <div class="q-graph">
            <div class="g-ratings" style="line-height:9px;"> 5&nbsp;-<br>
              4&nbsp;-<br>
              3&nbsp;-<br>
              2&nbsp;-<br>
              1&nbsp;-<br>
            </div>
            <table style="float:left; width:50px; margin-left:12px; margin-top:3px;padding:0px;" cellpadding="0">
              <tr>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#32839E; width:8px; height:38px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#E0B640; width:8px; height:19px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
              </tr>
            </table>
          </div>
        </div>
        <div class="q-details">
          <div class="q-detail-div">
            <div class="q-notes-reader1">
              <div class="q-notes-heading">
                <h2>Reader 1</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
            <div class="q-notes-reader2">
              <div class="q-notes-heading">
                <h2>Reader 2</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="q-maindiv" style="margin-bottom:10px;">
        <div class="q-toppart">
          <div class="q-title"> 5. Do you feel an emotional connection through the development of a character's emotional maturity? </div>
          <div class="q-graph">
            <div class="g-ratings" style="line-height:9px;"> 5&nbsp;-<br>
              4&nbsp;-<br>
              3&nbsp;-<br>
              2&nbsp;-<br>
              1&nbsp;-<br>
            </div>
            <table style="float:left; width:50px; margin-left:12px; margin-top:3px;padding:0px;" cellpadding="0">
              <tr>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#32839E; width:8px; height:28px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#E0B640; width:8px; height:38px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
              </tr>
            </table>
          </div>
        </div>
        <div class="q-details">
          <div class="q-detail-div">
            <div class="q-notes-reader1">
              <div class="q-notes-heading">
                <h2>Reader 1</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="q-maindiv" style="margin-bottom:10px;">
        <div class="q-toppart">
          <div class="q-title"> 6. Does the emotional and spiritual development of the protagonist provide you with a sense of connection, identification, and interest? </div>
          <div class="q-graph">
            <div class="g-ratings" style="line-height:9px;"> 5&nbsp;-<br>
              4&nbsp;-<br>
              3&nbsp;-<br>
              2&nbsp;-<br>
              1&nbsp;-<br>
            </div>
            <table style="float:left; width:50px; margin-left:12px; margin-top:3px;padding:0px;" cellpadding="0">
              <tr>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#32839E; width:8px; height:19px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#E0B640; width:8px; height:38px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
              </tr>
            </table>
          </div>
        </div>
        <div class="q-details">
          <div class="q-detail-div">
            <div class="q-notes-reader1">
              <div class="q-notes-heading">
                <h2>Reader 1</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
            <div class="q-notes-reader2">
              <div class="q-notes-heading">
                <h2>Reader 2</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="QCat-div ">
      <table style="float:left; margin-left:-2px; margin-bottom:10px;">
        <tr>
          <td style="color:#000; font-size:14px; font-weight:bold; padding:6px 0px;">Theme</td>
        </tr>
      </table>
      <div class="clear"></div>
      <div class="q-maindiv" style="margin-bottom:10px;">
        <div class="q-toppart">
          <div class="q-title"> 1. Does the script have a single, clear, and powerful theme? </div>
          <div class="q-graph">
            <div class="g-ratings" style="line-height:9px;"> 5&nbsp;-<br>
              4&nbsp;-<br>
              3&nbsp;-<br>
              2&nbsp;-<br>
              1&nbsp;-<br>
            </div>
            <table style="float:left; width:50px; margin-left:12px; margin-top:3px;padding:0px;" cellpadding="0">
              <tr>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#32839E; width:8px; height:28px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#E0B640; width:8px; height:38px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
              </tr>
            </table>
          </div>
        </div>
        <div class="q-details">
          <div class="q-detail-div">
            <div class="q-notes-reader1">
              <div class="q-notes-heading">
                <h2>Reader 1</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
            <div class="q-notes-reader2">
              <div class="q-notes-heading">
                <h2>Reader 2</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="q-maindiv" style="margin-bottom:10px;">
        <div class="q-toppart">
          <div class="q-title"> 2. Is the theme embodied by the story rather than simply stated? </div>
          <div class="q-graph">
            <div class="g-ratings" style="line-height:9px;"> 5&nbsp;-<br>
              4&nbsp;-<br>
              3&nbsp;-<br>
              2&nbsp;-<br>
              1&nbsp;-<br>
            </div>
            <table style="float:left; width:50px; margin-left:12px; margin-top:3px;padding:0px;" cellpadding="0">
              <tr>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#32839E; width:8px; height:19px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#E0B640; width:8px; height:28px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
              </tr>
            </table>
          </div>
        </div>
        <div class="q-details">
          <div class="q-detail-div">
            <div class="q-notes-reader1">
              <div class="q-notes-heading">
                <h2>Reader 1</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
            <div class="q-notes-reader2">
              <div class="q-notes-heading">
                <h2>Reader 2</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="q-maindiv" style="margin-bottom:10px;">
        <div class="q-toppart">
          <div class="q-title"> 3. Is the theme tested by the opposing values of the protagonist and the antagonist </div>
          <div class="q-graph">
            <div class="g-ratings" style="line-height:9px;"> 5&nbsp;-<br>
              4&nbsp;-<br>
              3&nbsp;-<br>
              2&nbsp;-<br>
              1&nbsp;-<br>
            </div>
            <table style="float:left; width:50px; margin-left:12px; margin-top:3px;padding:0px;" cellpadding="0">
              <tr>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#32839E; width:8px; height:28px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#E0B640; width:8px; height:38px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
              </tr>
            </table>
          </div>
        </div>
        <div class="q-details">
          <div class="q-detail-div">
            <div class="q-notes-reader1">
              <div class="q-notes-heading">
                <h2>Reader 1</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
            <div class="q-notes-reader2">
              <div class="q-notes-heading">
                <h2>Reader 2</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="q-maindiv" style="margin-bottom:10px;">
        <div class="q-toppart">
          <div class="q-title"> 4. Is the theme always working in the story? </div>
          <div class="q-graph">
            <div class="g-ratings" style="line-height:9px;"> 5&nbsp;-<br>
              4&nbsp;-<br>
              3&nbsp;-<br>
              2&nbsp;-<br>
              1&nbsp;-<br>
            </div>
            <table style="float:left; width:50px; margin-left:12px; margin-top:3px;padding:0px;" cellpadding="0">
              <tr>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#32839E; width:8px; height:38px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#E0B640; width:8px; height:28px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
              </tr>
            </table>
          </div>
        </div>
        <div class="q-details">
          <div class="q-detail-div">
            <div class="q-notes-reader1">
              <div class="q-notes-heading">
                <h2>Reader 1</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
            <div class="q-notes-reader2">
              <div class="q-notes-heading">
                <h2>Reader 2</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="q-maindiv" style="margin-bottom:10px;">
        <div class="q-toppart">
          <div class="q-title"> 5. Can the theme be stated in a simple statement? </div>
          <div class="q-graph">
            <div class="g-ratings" style="line-height:9px;"> 5&nbsp;-<br>
              4&nbsp;-<br>
              3&nbsp;-<br>
              2&nbsp;-<br>
              1&nbsp;-<br>
            </div>
            <table style="float:left; width:50px; margin-left:12px; margin-top:3px;padding:0px;" cellpadding="0">
              <tr>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#32839E; width:8px; height:38px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#E0B640; width:8px; height:38px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
              </tr>
            </table>
          </div>
        </div>
        <div class="q-details">
          <div class="q-detail-div">
            <div class="q-notes-reader1">
              <div class="q-notes-heading">
                <h2>Reader 1</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
            <div class="q-notes-reader2">
              <div class="q-notes-heading">
                <h2>Reader 2</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="QCat-div ">
      <table style="float:left; margin-left:-2px; margin-bottom:10px;">
        <tr>
          <td style="color:#000; font-size:14px; font-weight:bold; padding:6px 0px;">Marketability</td>
        </tr>
      </table>
      <div class="clear"></div>
      <div class="q-maindiv" style="margin-bottom:10px;">
        <div class="q-toppart">
          <div class="q-title"> 1. Does the story have an enticing hook that will attract viewers? </div>
          <div class="q-graph">
            <div class="g-ratings" style="line-height:9px;"> 5&nbsp;-<br>
              4&nbsp;-<br>
              3&nbsp;-<br>
              2&nbsp;-<br>
              1&nbsp;-<br>
            </div>
            <table style="float:left; width:50px; margin-left:12px; margin-top:3px;padding:0px;" cellpadding="0">
              <tr>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#32839E; width:8px; height:28px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#E0B640; width:8px; height:38px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
              </tr>
            </table>
          </div>
        </div>
        <div class="q-details">
          <div class="q-detail-div">
            <div class="q-notes-reader1">
              <div class="q-notes-heading">
                <h2>Reader 1</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
            <div class="q-notes-reader2">
              <div class="q-notes-heading">
                <h2>Reader 2</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="q-maindiv" style="margin-bottom:10px;">
        <div class="q-toppart">
          <div class="q-title"> 2. Does the script have big universal stakes? </div>
          <div class="q-graph">
            <div class="g-ratings" style="line-height:9px;"> 5&nbsp;-<br>
              4&nbsp;-<br>
              3&nbsp;-<br>
              2&nbsp;-<br>
              1&nbsp;-<br>
            </div>
            <table style="float:left; width:50px; margin-left:12px; margin-top:3px;padding:0px;" cellpadding="0">
              <tr>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#32839E; width:8px; height:38px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#E0B640; width:8px; height:28px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
              </tr>
            </table>
          </div>
        </div>
        <div class="q-details">
          <div class="q-detail-div">
            <div class="q-notes-reader1">
              <div class="q-notes-heading">
                <h2>Reader 1</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
            <div class="q-notes-reader2">
              <div class="q-notes-heading">
                <h2>Reader 2</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="q-maindiv" style="margin-bottom:10px;">
        <div class="q-toppart">
          <div class="q-title"> 3. Can you picture the trailer in your head? </div>
          <div class="q-graph">
            <div class="g-ratings" style="line-height:9px;"> 5&nbsp;-<br>
              4&nbsp;-<br>
              3&nbsp;-<br>
              2&nbsp;-<br>
              1&nbsp;-<br>
            </div>
            <table style="float:left; width:50px; margin-left:12px; margin-top:3px;padding:0px;" cellpadding="0">
              <tr>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#32839E; width:8px; height:28px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#E0B640; width:8px; height:38px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
              </tr>
            </table>
          </div>
        </div>
        <div class="q-details">
          <div class="q-detail-div">
            <div class="q-notes-reader1">
              <div class="q-notes-heading">
                <h2>Reader 1</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
            <div class="q-notes-reader2">
              <div class="q-notes-heading">
                <h2>Reader 2</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="q-maindiv" style="margin-bottom:10px;">
        <div class="q-toppart">
          <div class="q-title"> 4. Would you be an investor in this movie? </div>
          <div class="q-graph">
            <div class="g-ratings" style="line-height:9px;"> 5&nbsp;-<br>
              4&nbsp;-<br>
              3&nbsp;-<br>
              2&nbsp;-<br>
              1&nbsp;-<br>
            </div>
            <table style="float:left; width:50px; margin-left:12px; margin-top:3px;padding:0px;" cellpadding="0">
              <tr>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#32839E; width:8px; height:28px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#E0B640; width:8px; height:28px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
              </tr>
            </table>
          </div>
        </div>
        <div class="q-details">
          <div class="q-detail-div">
            <div class="q-notes-reader1">
              <div class="q-notes-heading">
                <h2>Reader 1</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
            <div class="q-notes-reader2">
              <div class="q-notes-heading">
                <h2>Reader 2</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="q-maindiv" style="margin-bottom:10px;">
        <div class="q-toppart">
          <div class="q-title"> 5. Does the script have a "high concept" premise? </div>
          <div class="q-graph">
            <div class="g-ratings" style="line-height:9px;"> 5&nbsp;-<br>
              4&nbsp;-<br>
              3&nbsp;-<br>
              2&nbsp;-<br>
              1&nbsp;-<br>
            </div>
            <table style="float:left; width:50px; margin-left:12px; margin-top:3px;padding:0px;" cellpadding="0">
              <tr>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#32839E; width:8px; height:28px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#E0B640; width:8px; height:38px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
              </tr>
            </table>
          </div>
        </div>
        <div class="q-details">
          <div class="q-detail-div">
            <div class="q-notes-reader1">
              <div class="q-notes-heading">
                <h2>Reader 1</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
            <div class="q-notes-reader2">
              <div class="q-notes-heading">
                <h2>Reader 2</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="q-maindiv" style="margin-bottom:10px;">
        <div class="q-toppart">
          <div class="q-title"> 6. Is the story intriguing enough to share with others? </div>
          <div class="q-graph">
            <div class="g-ratings" style="line-height:9px;"> 5&nbsp;-<br>
              4&nbsp;-<br>
              3&nbsp;-<br>
              2&nbsp;-<br>
              1&nbsp;-<br>
            </div>
            <table style="float:left; width:50px; margin-left:12px; margin-top:3px;padding:0px;" cellpadding="0">
              <tr>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#32839E; width:8px; height:38px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#E0B640; width:8px; height:28px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
              </tr>
            </table>
          </div>
        </div>
        <div class="q-details">
          <div class="q-detail-div">
            <div class="q-notes-reader1">
              <div class="q-notes-heading">
                <h2>Reader 1</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
            <div class="q-notes-reader2">
              <div class="q-notes-heading">
                <h2>Reader 2</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="QCat-div ">
      <table style="float:left; margin-left:-2px; margin-bottom:10px;">
        <tr>
          <td style="color:#000; font-size:14px; font-weight:bold; padding:6px 0px;">Dialogue</td>
        </tr>
      </table>
      <div class="clear"></div>
      <div class="q-maindiv" style="margin-bottom:10px;">
        <div class="q-toppart">
          <div class="q-title"> 1. Does the dialogue of each character express his or her own unique personality? </div>
          <div class="q-graph">
            <div class="g-ratings" style="line-height:9px;"> 5&nbsp;-<br>
              4&nbsp;-<br>
              3&nbsp;-<br>
              2&nbsp;-<br>
              1&nbsp;-<br>
            </div>
            <table style="float:left; width:50px; margin-left:12px; margin-top:3px;padding:0px;" cellpadding="0">
              <tr>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#32839E; width:8px; height:28px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#E0B640; width:8px; height:38px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
              </tr>
            </table>
          </div>
        </div>
        <div class="q-details">
          <div class="q-detail-div">
            <div class="q-notes-reader1">
              <div class="q-notes-heading">
                <h2>Reader 1</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
            <div class="q-notes-reader2">
              <div class="q-notes-heading">
                <h2>Reader 2</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="q-maindiv" style="margin-bottom:10px;">
        <div class="q-toppart">
          <div class="q-title"> 2. Does each character speak in a distinct and personal way? </div>
          <div class="q-graph">
            <div class="g-ratings" style="line-height:9px;"> 5&nbsp;-<br>
              4&nbsp;-<br>
              3&nbsp;-<br>
              2&nbsp;-<br>
              1&nbsp;-<br>
            </div>
            <table style="float:left; width:50px; margin-left:12px; margin-top:3px;padding:0px;" cellpadding="0">
              <tr>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#32839E; width:8px; height:28px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#E0B640; width:8px; height:28px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
              </tr>
            </table>
          </div>
        </div>
        <div class="q-details">
          <div class="q-detail-div">
            <div class="q-notes-reader1">
              <div class="q-notes-heading">
                <h2>Reader 1</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
            <div class="q-notes-reader2">
              <div class="q-notes-heading">
                <h2>Reader 2</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="q-maindiv" style="margin-bottom:10px;">
        <div class="q-toppart">
          <div class="q-title"> 3. Is the dialogue spare, lean and free of unneeded words? </div>
          <div class="q-graph">
            <div class="g-ratings" style="line-height:9px;"> 5&nbsp;-<br>
              4&nbsp;-<br>
              3&nbsp;-<br>
              2&nbsp;-<br>
              1&nbsp;-<br>
            </div>
            <table style="float:left; width:50px; margin-left:12px; margin-top:3px;padding:0px;" cellpadding="0">
              <tr>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#32839E; width:8px; height:28px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#E0B640; width:8px; height:38px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
              </tr>
            </table>
          </div>
        </div>
        <div class="q-details">
          <div class="q-detail-div">
            <div class="q-notes-reader1">
              <div class="q-notes-heading">
                <h2>Reader 1</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
            <div class="q-notes-reader2">
              <div class="q-notes-heading">
                <h2>Reader 2</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="q-maindiv" style="margin-bottom:10px;">
        <div class="q-toppart">
          <div class="q-title"> 4. Is the dialogue nuanced and filled with subtext instead of stated right on the nose? </div>
          <div class="q-graph">
            <div class="g-ratings" style="line-height:9px;"> 5&nbsp;-<br>
              4&nbsp;-<br>
              3&nbsp;-<br>
              2&nbsp;-<br>
              1&nbsp;-<br>
            </div>
            <table style="float:left; width:50px; margin-left:12px; margin-top:3px;padding:0px;" cellpadding="0">
              <tr>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#32839E; width:8px; height:38px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#E0B640; width:8px; height:28px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
              </tr>
            </table>
          </div>
        </div>
        <div class="q-details">
          <div class="q-detail-div">
            <div class="q-notes-reader1">
              <div class="q-notes-heading">
                <h2>Reader 1</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
            <div class="q-notes-reader2">
              <div class="q-notes-heading">
                <h2>Reader 2</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="QCat-div ">
      <table style="float:left; margin-left:-2px; margin-bottom:10px;">
        <tr>
          <td style="color:#000; font-size:14px; font-weight:bold; padding:6px 0px;">Structure</td>
        </tr>
      </table>
      <div class="clear"></div>
      <div class="q-maindiv" style="margin-bottom:10px;">
        <div class="q-toppart">
          <div class="q-title"> 1. Do you find yourself absorbed in the story? </div>
          <div class="q-graph">
            <div class="g-ratings" style="line-height:9px;"> 5&nbsp;-<br>
              4&nbsp;-<br>
              3&nbsp;-<br>
              2&nbsp;-<br>
              1&nbsp;-<br>
            </div>
            <table style="float:left; width:50px; margin-left:12px; margin-top:3px;padding:0px;" cellpadding="0">
              <tr>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#32839E; width:8px; height:28px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#E0B640; width:8px; height:38px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
              </tr>
            </table>
          </div>
        </div>
        <div class="q-details">
          <div class="q-detail-div">
            <div class="q-notes-reader1">
              <div class="q-notes-heading">
                <h2>Reader 1</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
            <div class="q-notes-reader2">
              <div class="q-notes-heading">
                <h2>Reader 2</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="q-maindiv" style="margin-bottom:10px;">
        <div class="q-toppart">
          <div class="q-title"> 2. Do the majority of scenes revolve around the core conflict? </div>
          <div class="q-graph">
            <div class="g-ratings" style="line-height:9px;"> 5&nbsp;-<br>
              4&nbsp;-<br>
              3&nbsp;-<br>
              2&nbsp;-<br>
              1&nbsp;-<br>
            </div>
            <table style="float:left; width:50px; margin-left:12px; margin-top:3px;padding:0px;" cellpadding="0">
              <tr>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#32839E; width:8px; height:38px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#E0B640; width:8px; height:28px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
              </tr>
            </table>
          </div>
        </div>
        <div class="q-details">
          <div class="q-detail-div">
            <div class="q-notes-reader1">
              <div class="q-notes-heading">
                <h2>Reader 1</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
            <div class="q-notes-reader2">
              <div class="q-notes-heading">
                <h2>Reader 2</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="q-maindiv" style="margin-bottom:10px;">
        <div class="q-toppart">
          <div class="q-title"> 3. Does the story deliver on the expectations created by the premise? </div>
          <div class="q-graph">
            <div class="g-ratings" style="line-height:9px;"> 5&nbsp;-<br>
              4&nbsp;-<br>
              3&nbsp;-<br>
              2&nbsp;-<br>
              1&nbsp;-<br>
            </div>
            <table style="float:left; width:50px; margin-left:12px; margin-top:3px;padding:0px;" cellpadding="0">
              <tr>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#32839E; width:8px; height:38px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#E0B640; width:8px; height:38px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
              </tr>
            </table>
          </div>
        </div>
        <div class="q-details">
          <div class="q-detail-div">
            <div class="q-notes-reader1">
              <div class="q-notes-heading">
                <h2>Reader 1</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
            <div class="q-notes-reader2">
              <div class="q-notes-heading">
                <h2>Reader 2</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="q-maindiv" style="margin-bottom:10px;">
        <div class="q-toppart">
          <div class="q-title"> 4. Is the story compelling enough to build a strong foundation for tension and interesting situations? </div>
          <div class="q-graph">
            <div class="g-ratings" style="line-height:9px;"> 5&nbsp;-<br>
              4&nbsp;-<br>
              3&nbsp;-<br>
              2&nbsp;-<br>
              1&nbsp;-<br>
            </div>
            <table style="float:left; width:50px; margin-left:12px; margin-top:3px;padding:0px;" cellpadding="0">
              <tr>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#32839E; width:8px; height:28px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#E0B640; width:8px; height:28px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
              </tr>
            </table>
          </div>
        </div>
        <div class="q-details">
          <div class="q-detail-div">
            <div class="q-notes-reader1">
              <div class="q-notes-heading">
                <h2>Reader 1</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
            <div class="q-notes-reader2">
              <div class="q-notes-heading">
                <h2>Reader 2</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="q-maindiv" style="margin-bottom:10px;">
        <div class="q-toppart">
          <div class="q-title"> 5. Do the subplots in the story have sufficient conflict? </div>
          <div class="q-graph">
            <div class="g-ratings" style="line-height:9px;"> 5&nbsp;-<br>
              4&nbsp;-<br>
              3&nbsp;-<br>
              2&nbsp;-<br>
              1&nbsp;-<br>
            </div>
            <table style="float:left; width:50px; margin-left:12px; margin-top:3px;padding:0px;" cellpadding="0">
              <tr>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#32839E; width:8px; height:38px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#E0B640; width:8px; height:28px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
              </tr>
            </table>
          </div>
        </div>
        <div class="q-details">
          <div class="q-detail-div">
            <div class="q-notes-reader1">
              <div class="q-notes-heading">
                <h2>Reader 1</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
            <div class="q-notes-reader2">
              <div class="q-notes-heading">
                <h2>Reader 2</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="q-maindiv" style="margin-bottom:10px;">
        <div class="q-toppart">
          <div class="q-title"> 6. Are there enough reversals in the story to keep it unpredictable and exciting? </div>
          <div class="q-graph">
            <div class="g-ratings" style="line-height:9px;"> 5&nbsp;-<br>
              4&nbsp;-<br>
              3&nbsp;-<br>
              2&nbsp;-<br>
              1&nbsp;-<br>
            </div>
            <table style="float:left; width:50px; margin-left:12px; margin-top:3px;padding:0px;" cellpadding="0">
              <tr>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#32839E; width:8px; height:28px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#E0B640; width:8px; height:28px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
              </tr>
            </table>
          </div>
        </div>
        <div class="q-details">
          <div class="q-detail-div">
            <div class="q-notes-reader1">
              <div class="q-notes-heading">
                <h2>Reader 1</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
            <div class="q-notes-reader2">
              <div class="q-notes-heading">
                <h2>Reader 2</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="QCat-div ">
      <table style="float:left; margin-left:-2px; margin-bottom:10px;">
        <tr>
          <td style="color:#000; font-size:14px; font-weight:bold; padding:6px 0px;">Ending</td>
        </tr>
      </table>
      <div class="clear"></div>
      <div class="q-maindiv" style="margin-bottom:10px;">
        <div class="q-toppart">
          <div class="q-title"> 1. Is the ending satisfying so that you want to share it with others? </div>
          <div class="q-graph">
            <div class="g-ratings" style="line-height:9px;"> 5&nbsp;-<br>
              4&nbsp;-<br>
              3&nbsp;-<br>
              2&nbsp;-<br>
              1&nbsp;-<br>
            </div>
            <table style="float:left; width:50px; margin-left:12px; margin-top:3px;padding:0px;" cellpadding="0">
              <tr>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#32839E; width:8px; height:28px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#E0B640; width:8px; height:38px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
              </tr>
            </table>
          </div>
        </div>
        <div class="q-details">
          <div class="q-detail-div">
            <div class="q-notes-reader1">
              <div class="q-notes-heading">
                <h2>Reader 1</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
            <div class="q-notes-reader2">
              <div class="q-notes-heading">
                <h2>Reader 2</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="q-maindiv" style="margin-bottom:10px;">
        <div class="q-toppart">
          <div class="q-title"> 2. Does the ending tie up all lose ends? </div>
          <div class="q-graph">
            <div class="g-ratings" style="line-height:9px;"> 5&nbsp;-<br>
              4&nbsp;-<br>
              3&nbsp;-<br>
              2&nbsp;-<br>
              1&nbsp;-<br>
            </div>
            <table style="float:left; width:50px; margin-left:12px; margin-top:3px;padding:0px;" cellpadding="0">
              <tr>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#32839E; width:8px; height:28px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#E0B640; width:8px; height:28px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
              </tr>
            </table>
          </div>
        </div>
        <div class="q-details">
          <div class="q-detail-div">
            <div class="q-notes-reader1">
              <div class="q-notes-heading">
                <h2>Reader 1</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
            <div class="q-notes-reader2">
              <div class="q-notes-heading">
                <h2>Reader 2</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="q-maindiv" style="margin-bottom:10px;">
        <div class="q-toppart">
          <div class="q-title"> 3. Does the ending answer the dramatic question set up at the beginning? </div>
          <div class="q-graph">
            <div class="g-ratings" style="line-height:9px;"> 5&nbsp;-<br>
              4&nbsp;-<br>
              3&nbsp;-<br>
              2&nbsp;-<br>
              1&nbsp;-<br>
            </div>
            <table style="float:left; width:50px; margin-left:12px; margin-top:3px;padding:0px;" cellpadding="0">
              <tr>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#32839E; width:8px; height:28px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#E0B640; width:8px; height:28px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
              </tr>
            </table>
          </div>
        </div>
        <div class="q-details">
          <div class="q-detail-div">
            <div class="q-notes-reader1">
              <div class="q-notes-heading">
                <h2>Reader 1</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
            <div class="q-notes-reader2">
              <div class="q-notes-heading">
                <h2>Reader 2</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="q-maindiv" style="margin-bottom:10px;">
        <div class="q-toppart">
          <div class="q-title"> 4. Does the ending come about because of the protagonist's actions? </div>
          <div class="q-graph">
            <div class="g-ratings" style="line-height:9px;"> 5&nbsp;-<br>
              4&nbsp;-<br>
              3&nbsp;-<br>
              2&nbsp;-<br>
              1&nbsp;-<br>
            </div>
            <table style="float:left; width:50px; margin-left:12px; margin-top:3px;padding:0px;" cellpadding="0">
              <tr>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#32839E; width:8px; height:28px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#E0B640; width:8px; height:38px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
              </tr>
            </table>
          </div>
        </div>
        <div class="q-details">
          <div class="q-detail-div">
            <div class="q-notes-reader1">
              <div class="q-notes-heading">
                <h2>Reader 1</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
            <div class="q-notes-reader2">
              <div class="q-notes-heading">
                <h2>Reader 2</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="q-maindiv" style="margin-bottom:10px;">
        <div class="q-toppart">
          <div class="q-title"> 5. Does the protagonist overcome his character flaw? </div>
          <div class="q-graph">
            <div class="g-ratings" style="line-height:9px;"> 5&nbsp;-<br>
              4&nbsp;-<br>
              3&nbsp;-<br>
              2&nbsp;-<br>
              1&nbsp;-<br>
            </div>
            <table style="float:left; width:50px; margin-left:12px; margin-top:3px;padding:0px;" cellpadding="0">
              <tr>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#32839E; width:8px; height:38px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#E0B640; width:8px; height:38px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
              </tr>
            </table>
          </div>
        </div>
        <div class="q-details">
          <div class="q-detail-div">
            <div class="q-notes-reader1">
              <div class="q-notes-heading">
                <h2>Reader 1</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
            <div class="q-notes-reader2">
              <div class="q-notes-heading">
                <h2>Reader 2</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
                <b>Suggestion:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="q-maindiv" style="margin-bottom:10px;">
        <div class="q-toppart">
          <div class="q-title"> 6. Does something unexpected happen that took you by surprise? </div>
          <div class="q-graph">
            <div class="g-ratings" style="line-height:9px;"> 5&nbsp;-<br>
              4&nbsp;-<br>
              3&nbsp;-<br>
              2&nbsp;-<br>
              1&nbsp;-<br>
            </div>
            <table style="float:left; width:50px; margin-left:12px; margin-top:3px;padding:0px;" cellpadding="0">
              <tr>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#32839E; width:8px; height:28px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#E0B640; width:8px; height:28px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
              </tr>
            </table>
          </div>
        </div>
        <div class="q-details">
          <div class="q-detail-div">
            <div class="q-notes-reader1">
              <div class="q-notes-heading">
                <h2>Reader 1</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
            <div class="q-notes-reader2">
              <div class="q-notes-heading">
                <h2>Reader 2</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="q-maindiv" style="margin-bottom:10px;">
        <div class="q-toppart">
          <div class="q-title"> 7. Does the ending leave you with a strong emotional response? </div>
          <div class="q-graph">
            <div class="g-ratings" style="line-height:9px;"> 5&nbsp;-<br>
              4&nbsp;-<br>
              3&nbsp;-<br>
              2&nbsp;-<br>
              1&nbsp;-<br>
            </div>
            <table style="float:left; width:50px; margin-left:12px; margin-top:3px;padding:0px;" cellpadding="0">
              <tr>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#32839E; width:8px; height:28px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#E0B640; width:8px; height:28px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
              </tr>
            </table>
          </div>
        </div>
        <div class="q-details">
          <div class="q-detail-div">
            <div class="q-notes-reader1">
              <div class="q-notes-heading">
                <h2>Reader 1</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
            <div class="q-notes-reader2">
              <div class="q-notes-heading">
                <h2>Reader 2</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="QCat-div ">
      <table style="float:left; margin-left:-2px; margin-bottom:10px;">
        <tr>
          <td style="color:#000; font-size:14px; font-weight:bold; padding:6px 0px;">Pacing</td>
        </tr>
      </table>
      <div class="clear"></div>
      <div class="q-maindiv" style="margin-bottom:10px;">
        <div class="q-toppart">
          <div class="q-title"> 1. Does the script drag? </div>
          <div class="q-graph">
            <div class="g-ratings" style="line-height:9px;"> 5&nbsp;-<br>
              4&nbsp;-<br>
              3&nbsp;-<br>
              2&nbsp;-<br>
              1&nbsp;-<br>
            </div>
            <table style="float:left; width:50px; margin-left:12px; margin-top:3px;padding:0px;" cellpadding="0">
              <tr>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#32839E; width:8px; height:28px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#E0B640; width:8px; height:28px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
              </tr>
            </table>
          </div>
        </div>
        <div class="q-details">
          <div class="q-detail-div">
            <div class="q-notes-reader1">
              <div class="q-notes-heading">
                <h2>Reader 1</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
            <div class="q-notes-reader2">
              <div class="q-notes-heading">
                <h2>Reader 2</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="q-maindiv" style="margin-bottom:10px;">
        <div class="q-toppart">
          <div class="q-title"> 2. Is there a good balance between dialogue and action? </div>
          <div class="q-graph">
            <div class="g-ratings" style="line-height:9px;"> 5&nbsp;-<br>
              4&nbsp;-<br>
              3&nbsp;-<br>
              2&nbsp;-<br>
              1&nbsp;-<br>
            </div>
            <table style="float:left; width:50px; margin-left:12px; margin-top:3px;padding:0px;" cellpadding="0">
              <tr>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#32839E; width:8px; height:28px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#E0B640; width:8px; height:38px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
              </tr>
            </table>
          </div>
        </div>
        <div class="q-details">
          <div class="q-detail-div">
            <div class="q-notes-reader1">
              <div class="q-notes-heading">
                <h2>Reader 1</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
            <div class="q-notes-reader2">
              <div class="q-notes-heading">
                <h2>Reader 2</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="q-maindiv" style="margin-bottom:10px;">
        <div class="q-toppart">
          <div class="q-title"> 3. Are there scenes where nothing much happens and/or scenes that should be cut? </div>
          <div class="q-graph">
            <div class="g-ratings" style="line-height:9px;"> 5&nbsp;-<br>
              4&nbsp;-<br>
              3&nbsp;-<br>
              2&nbsp;-<br>
              1&nbsp;-<br>
            </div>
            <table style="float:left; width:50px; margin-left:12px; margin-top:3px;padding:0px;" cellpadding="0">
              <tr>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#32839E; width:8px; height:38px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#E0B640; width:8px; height:28px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
              </tr>
            </table>
          </div>
        </div>
        <div class="q-details">
          <div class="q-detail-div">
            <div class="q-notes-reader1">
              <div class="q-notes-heading">
                <h2>Reader 1</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
            <div class="q-notes-reader2">
              <div class="q-notes-heading">
                <h2>Reader 2</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="q-maindiv" style="margin-bottom:10px;">
        <div class="q-toppart">
          <div class="q-title"> 4. Do the scenes flow naturally from one to the next? </div>
          <div class="q-graph">
            <div class="g-ratings" style="line-height:9px;"> 5&nbsp;-<br>
              4&nbsp;-<br>
              3&nbsp;-<br>
              2&nbsp;-<br>
              1&nbsp;-<br>
            </div>
            <table style="float:left; width:50px; margin-left:12px; margin-top:3px;padding:0px;" cellpadding="0">
              <tr>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#32839E; width:8px; height:28px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#E0B640; width:8px; height:28px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
              </tr>
            </table>
          </div>
        </div>
        <div class="q-details">
          <div class="q-detail-div">
            <div class="q-notes-reader1">
              <div class="q-notes-heading">
                <h2>Reader 1</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
            <div class="q-notes-reader2">
              <div class="q-notes-heading">
                <h2>Reader 2</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="q-maindiv" style="margin-bottom:10px;">
        <div class="q-toppart">
          <div class="q-title"> 5. Do each of the characters appear for just the right amount of time? </div>
          <div class="q-graph">
            <div class="g-ratings" style="line-height:9px;"> 5&nbsp;-<br>
              4&nbsp;-<br>
              3&nbsp;-<br>
              2&nbsp;-<br>
              1&nbsp;-<br>
            </div>
            <table style="float:left; width:50px; margin-left:12px; margin-top:3px;padding:0px;" cellpadding="0">
              <tr>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#32839E; width:8px; height:28px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="background:#E0B640; width:8px; height:19px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
                <td style="background:#fff; height:50px; padding:0px; width:7px; vertical-align:bottom;"><table style="padding:0px; margin:0px; border:none;" cellpadding="0" cellspacing="0">
                    <tr>
                      <td style="width:8px; height:50px; padding:0px; margin:0px;border:none;"></td>
                    </tr>
                  </table></td>
              </tr>
            </table>
          </div>
        </div>
        <div class="q-details">
          <div class="q-detail-div">
            <div class="q-notes-reader1">
              <div class="q-notes-heading">
                <h2>Reader 1</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
            <div class="q-notes-reader2">
              <div class="q-notes-heading">
                <h2>Reader 2</h2>
              </div>
              <div class="clear"></div>
              <div class="q-notes-desc"> <b>Notes:</b>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br/>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>