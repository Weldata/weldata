<div class="page-1">
  <div class="page-header">PROCEDURE QUALIFICATION RECORD (PQR)<br>
    SECTION IX, QW-483 ASME BOILER AND PRESSURE VESSEL CODE</div>
  <div class="table pqr-details-wrapper">
    <table id="pqr-details">
      <tr>
        <td rowspan="6" id="logo-company">Company Logo</td>
        <th colspan="4" class="company-name">Company Name</th>
        <td rowspan="6" id="logo-weldata">Weldata Logo</td>
      </tr>
      <tr>
        <th>Date</th>
        <td ><?php print render($prepared_date); ?></td>
        <th>Revision</th>
        <td><?php print render($revision); ?></td>
      </tr>
      <tr>
        <th colspan="2" class="border top none">PQR Number</th>
        <td colspan="2"><?php print render($title); ?></td>
      </tr>
      <tr>
        <th colspan="2">WPS Used</th>
        <td colspan="2"><?php print render($wps_used); ?></td>
      </tr>
      <tr>
        <th colspan="2">Welding Process(es) Used</th>
        <td colspan="2"><?php print render($welding_process); ?></td>
      </tr>
      <tr>
        <th colspan="2">Process(es) Type(s)</th>
        <td colspan="2"><?php print render($process_type); ?></td>
      </tr>
      <tr>
        <td colspan="6" class="border top">
        <table id="joint">
            <caption>
            JOINTS (QW-402)
            </caption>
            <tr>
              <td><div class="joint-image"><?php print render($joint_image); ?></div>
                <div class="joint-text"><?php print render($joint_type); ?>Design of Test Coupon (sketch, figure or reference) <br>
                  (For combination qualifications, the deposited weld metal thickness shall be recorded for each filler metal or process used)</div></td>
            </tr>
          </table></td>
      </tr>
    </table>
  </div>
  <div class="table general-details-wrapper">
<table id="general-details">
  <tr>
    <th colspan="8" scope="col" class="border right"><div class="heading">BASE METALS (QW-403)</div></th>
    <th colspan="8" scope="col" class="border right"><div class="heading">POST WELD HEAT TREATMENT (QW-407)</div></th>
    </tr>
  <tr>
    <td colspan="5">Material Specification</td>
    <td colspan="3" class="border right value"><?php print render($material_specification); ?></td>
    <td colspan="2">Temperature</td>
    <td colspan="6" class="border right value"><?php print render($pwht_temperature); ?></td>
    </tr>
  <tr>
    <td colspan="5" scope="row">Type or Grade or UNS Number</td>
    <td colspan="3" scope="row" class="border right value"><?php print render($type_grade_uns); ?></td>
    <td colspan="2">Time</td>
    <td colspan="6" class="border right value"><?php print render($pwht_time); ?></td>
    </tr>
  <tr>
    <td rowspan="2" scope="row">P No.</td>
    <td rowspan="2" scope="row" class="value">--P.no.--</td>
    <td rowspan="2" scope="row">Group No.</td>
    <td rowspan="2" scope="row" class="value">--Group No.--</td>
    <td rowspan="2" scope="row">P No.</td>
    <td rowspan="2" scope="row" class="value">--P.No. --</td>
    <td rowspan="2" scope="row">Group No.</td>
    <td rowspan="2" class="border right value">--Group No.--</td>
    <td colspan="2" scope="row">Other</td>
    <td colspan="6" scope="row" class="border right"><?php print render($other_pwht); ?></td>
    </tr>
  <tr>
    <td colspan="8" scope="row" class="border right">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="5" scope="row">Thickness of Test Coupon</td>
    <td colspan="3" scope="row" class="border right"><?php print render($thickness_test_coupon); ?></td>
    <td colspan="8" class="border right">&nbsp;</td>
    </tr>
  <tr>
    <td colspan="5" scope="row">Diameter of Test Coupon</td>
    <td colspan="3" scope="row" class="border right"><?php print render($diameter_test_coupon); ?></td>
    <td colspan="8" class="border right bottom">&nbsp;</td>
    </tr>
  <tr>
    <td colspan="5" scope="row">Maximum Pass Thickness</td>
    <td colspan="3" scope="row" class="border right"><?php print render($maximum_pass_thickness); ?></td>
    <th colspan="8" scope="col" class="border right"><div class="heading">GAS (QW-408)</div></th>
    </tr>
  <tr>
    <td colspan="2" scope="col" >Other</td>
    <td colspan="6" class="border right" scope="col"><?php print render($other_base_metals); ?></td>
    <th colspan="8" scope="col" class="border right">Percent Composition</th>
    </tr>
  <tr>
    <td colspan="8" class="border right">&nbsp;</td>
    <td colspan="2">&nbsp;</td>
    <th colspan="2" scope="col">Gas(es)</th>
    <th colspan="2" scope="col">Mixture</th>
    <th colspan="2" scope="col" class="border right">Flow Rate</th>
    </tr>
  <tr>
    <td colspan="8" class="border right bottom">&nbsp;</td>
    <th colspan="2" scope="row">Shielding</th>
    <td colspan="2"><?php print render($shielding_gas); ?></td>
    <td colspan="2"><?php print render($shielding_mixture); ?></td>
    <td colspan="2" class="border right"><?php print render($shielding_flow_rate); ?></td>
    </tr>
  <tr>
    <th colspan="8" class="border right" scope="col"><div class="heading">FILLER METALS (QW-404)</div></th>
    <th colspan="2" scope="row">Trailing</th>
    <td colspan="2"><?php print render($trailing_gas); ?></td>
    <td colspan="2"><?php print render($trailing_mixture); ?></td>
    <td colspan="2" class="border right"><?php print render($trailing_flow_rate); ?></td>
    </tr>
  <tr>
    <th colspan="5" scope="col">Layer (combination welds)</th>
    <th scope="col">--1--</th>
    <th scope="col">--2--</th>
    <th scope="col" class="border right">--3--</th>
    <th colspan="2" scope="row">Backing</th>
    <td colspan="2"><?php print render($backing_gas); ?></td>
    <td colspan="2"><?php print render($backing_mixture); ?></td>
    <td colspan="2" class="border right"><?php print render($backing_flow_rate); ?></td>
    </tr>
  <tr>
    <td colspan="5" scope="row">SFA Specification</td>
    <td >&nbsp;</td>
    <td >&nbsp;</td>
    <td class="border right">&nbsp;</td>
    <th colspan="2" scope="row">Other</th>
    <td colspan="6" class="border right"><?php print render($other_gas); ?></td>
    </tr>
  <tr>
    <td colspan="5" scope="row">AWS Classification</td>
    <td>&nbsp;</td>
    <td >&nbsp;</td>
    <td class="border right">&nbsp;</td>
    <td colspan="8" class="border right">&nbsp;</td>
    </tr>
  <tr>
    <td colspan="5" scope="row">Filler Metal F No.</td>
    <td>&nbsp;</td>
    <td >&nbsp;</td>
    <td class="border right">&nbsp;</td>
    <td colspan="8" class="border right">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="5" scope="row">Weld Metal Analysis A No.</td>
    <td>&nbsp;</td>
    <td >&nbsp;</td>
    <td class="border right">&nbsp;</td>
    <td colspan="8" class="border right bottom" >&nbsp;</td>
  </tr>
  <tr>
    <td colspan="5" scope="row">Size of Filler Metal</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td class="border right">&nbsp;</td>
    <th colspan="8" scope="col" class="border right"><div class="heading">ELECTRICAL CHARACTERISTICS (QW-409)</div></th>
    </tr>
  <tr>
    <td colspan="5" scope="row">Filer Metal Product Form</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td class="border right">&nbsp;</td>
    <td colspan="4">Current</td>
    <td colspan="4" class="border right"><?php print render($current); ?></td>
    </tr>
  <tr>
    <td colspan="5" scope="row">Supplemental Filler Metal</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td class="border right">&nbsp;</td>
    <td colspan="4">Polarity</td>
    <td colspan="4" class="border right"><?php print render($polarity); ?></td>
    </tr>
  <tr>
    <td colspan="5" scope="row">Electrode Flux Classification</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td class="border right">&nbsp;</td>
    <td colspan="4">Amperage</td>
    <td colspan="4" class="border right"><?php print render($amperage); ?></td>
    </tr>
  <tr>
    <td colspan="5" scope="row">Flux Type</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td class="border right">&nbsp;</td>
    <td colspan="4">Voltage</td>
    <td colspan="4" class="border right"><?php print render($voltage); ?></td>
    </tr>
  <tr>
    <td colspan="5" scope="row">Flux Trade Name</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td class="border right">&nbsp;</td>
    <td colspan="4">Electrode Size</td>
    <td colspan="4" class="border right"><?php print render($electrode_size); ?></td>
    </tr>
  <tr>
    <td colspan="5" scope="row">Weld Metal Thickness</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td class="border right">&nbsp;</td>
    <td colspan="4">Transfer Mode for GMAW</td>
    <td colspan="4" class="border right"><?php print render($transfer_mode); ?></td>
    </tr>
  <tr>
    <td colspan="2" style="color: #FF0004" scope="row">Other</td>
    <td colspan="6" scope="row" class="border right">&nbsp;</td>
    <td colspan="2" style="color: #FF0004">Other</td>
    <td colspan="6" class="border right">&nbsp;</td>
    </tr>
  <tr>
    <td colspan="8" scope="row" class="border right">&nbsp;</td>
    <td colspan="8" class="border right"><?php print render($other_electrical); ?></td>
  </tr>
  <tr>
    <td colspan="8" scope="row" class="border right bottom">&nbsp;</td>
    <td colspan="8" class="border right">&nbsp;</td>
  </tr>
  <tr>
    <th colspan="8" scope="col" class="border right"><div class="heading">POSITION (QW-405)</div></th>
    <td colspan="8" class="border right bottom">&nbsp;</td>
    </tr>
  <tr>
    <td colspan="6" scope="col" >Position of Groove</td>
    <td colspan="2" scope="col" class="border right"><?php print render($groove_position); ?></td>
    <th colspan="8" scope="col" class="border right"><div class="heading">TECHNIQUE (QW-410)</div></th>
    </tr>
  <tr>
    <td colspan="6">Weld Progression (Uphill, Downhill)</td>
    <td colspan="2" class="border right"><?php print render($weld_progression); ?></td>
    <td colspan="5">Travel Speed</td>
    <td colspan="3" class="border right"><?php print render($travel_speed); ?></td>
    </tr>
  <tr>
    <td colspan="2">Other</td>
    <td colspan="6" class="border right"><?php print render($other_postion); ?></td>
    <td colspan="5">String or Weave Bead</td>
    <td colspan="3" class="border right"><?php print render($string_weave); ?></td>
    </tr>
  <tr>
    <th colspan="8" class="border right" scope="col">&nbsp;</th>
    <td colspan="5">Oscillation</td>
    <td colspan="3" class="border right"><?php print render($oscillation); ?></td>
    </tr>
  <tr>
    <td colspan="8" scope="row" class="border right bottom">&nbsp;</td>
    <td colspan="5">Multipass or Single Pass (per side)</td>
    <td colspan="3" class="border right"><?php print render($multipass); ?></td>
    </tr>
  <tr>
    <th colspan="8" scope="col" class="border right"><div class="heading">PREHEAT (QW-406)</div></th>
    <td colspan="5">Single or Multiple Electrodes</td>
    <td colspan="3" class="border right"><?php print render($electrodes); ?></td>
    </tr>
  <tr>
    <td colspan="4" scope="col" >Preheat Temperature</td>
    <td colspan="4" scope="col" class="border right"><?php print render($preheat_temperature); ?></td>
    <td colspan="2">Other</td>
    <td colspan="6" class="border right"><?php print render($other_technique); ?></td>
    </tr>
  <tr>
    <td colspan="4">Interpass Temperature</td>
    <td colspan="4" class="border right"><?php print render($interpass_temperature); ?></td>
    <td colspan="8" class="border right">&nbsp;</td>
    </tr>
  <tr>
    <td colspan="2">Other</td>
    <td colspan="6" class="border right"><?php print render($other_preheat); ?></td>
    <td colspan="8" class="border right">&nbsp;</td>
    </tr>
  <tr>
    <th colspan="8" scope="col" class="border right">&nbsp;</th>
    <td colspan="8" class="border right">&nbsp;</td>
    </tr>
  <tr>
    <td colspan="8" scope="row" class="border right">&nbsp;</td>
    <td colspan="8" scope="row" class="border right">&nbsp;</td>
    </tr>
</table>
</div>
</div>
<!--Page 1 End-->

<div class="page-2" id="tests">
  <div class="page-header">Procedure Qualification Record Form QW-483 (BACK) </div>
  <div class="pqr-no">PQR Number:<span><?php print render($title); ?></span></div>
  <div class="table">
    <table id="tensile-test">
      <caption>
      Tensile Test (QW-150)
      </caption>
      <thead>
        <tr>
          <th>Specimen No.</th>
          <th>Width</th>
          <th>Thickness</th>
          <th>Area</th>
          <th>Ulitimate Total Load</th>
          <th>Ultimate Unit Stress</th>
          <th>Type of Failure And Location</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </tbody>
    </table>
    <div class="comments">Comments : <span>--Comments Here--</span></div>
  </div>
  <div class="table">
    <table id="guided-bend-test">
      <caption>
      Guided Bend Tests (QW-160)
      </caption>
      <thead>
        <tr>
          <th>Type and Figure No.</th>
          <th>Result</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </tbody>
    </table>
    <div class="comments">Comments : <span>--Comments Here--</span></div>
  </div>
  <div class="table toughness-test-wrapper">
    <table id="toughness-test">
      <caption>
      Toughness Tests (QW-170)
      </caption>
      <thead>
        <tr>
          <th rowspan="2">Specimen No.</th>
          <th rowspan="2">Notch Location</th>
          <th rowspan="2">Specimen
            Size</th>
          <th rowspan="2">Test
            Temperature</th>
          <th colspan="3">Impact Values</th>
          <th rowspan="2">Drop Weight Break</th>
        </tr>
        <tr>
          <th>Ft-lb or J</th>
          <th>% Shear</th>
          <th>Mils (in.) or mm</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
      </tbody>
    </table>
    <div class="comments">Comments : <span>--Comments Here--</span></div>
  </div>
  <div class="table fillet-weld-test-wrapper">
    <table id="fillet-weld-test">
      <caption>
      Fillet-Weld Test (QW-180)
      </caption>
      <tbody>
        <tr>
          <td>Results Satisfactory : <span><?php print render($fillet_weld_result); ?></span></td>
          <td>Penetration into Parent Metal : <span><?php print render($fillet_weld_penetration); ?></span></td>
        </tr>
        <tr>
          <td colspan="2" class="macro-results">Macro - Results : <span><?php print render($fillet_weld_macro_result); ?></span></td>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="table other-test-wrapper">
    <table id="other-test">
      <caption>
      Other Tests
      </caption>
      <tbody>
        <tr>
          <td class="left">Type of Test</td>
          <td><?php print render($test_type); ?></td>
        </tr>
        <tr>
          <td class="left">Deposit Analysis</td>
          <td><?php print render($deposit_analysis); ?></td>
        </tr>
        <tr>
          <td class="left">Other</td>
          <td><?php print render($other_other_tests); ?></td>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="table welder-details-wrapper">
    <table id="welder-details">
      <tbody>
        <tr>
          <td class="left resize">Welder’s Name</td>
          <td class="left"><?php print render($welder_name); ?></td>
          <td class="left resize">Clock No.</td>
          <td class="left"><?php print render($clock_number); ?></td>
        </tr>
        <tr>
          <td class="left resize">Stamp Number</td>
          <td class="left"><?php print render($stamp_number); ?></td>
          <td class="left resize">Laboratory Test No.</td>
          <td class="left"><?php print render($lab_test_number); ?></td>
        </tr>
        <tr>
          <td class="left resize">Tests Conducted by</td>
          <td colspan="3"><?php print render($test_conducted_by); ?></td>
        </tr>
      </tbody>
    </table>
  </div>
  <div id="certify">
    <p>We certify that statements made in this record are correct and that the test welds were prepared, welded, and tested in accordance with the Requirements of Section IX of the ASME Boiler and Pressure Vessel Code</p>
  </div>
  <div class="table certified-by-wrapper">
    <table id='certified-by'>
      <tbody>
        <tr>
          <td>Manufacturer or Contractor</td>
          <td><?php print render($manufacturer); ?></td>
          <td>Certified By</td>
          <td><?php print render($certified_by); ?></td>
        </tr>
        <tr>
          <td class="signature">Signature</td>
          <td>&nbsp;</td>
          <td>Signature</td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td colspan="1">Document Prepared Date</td>
          <td><?php print render($prepared_date); ?></td>
          <td>Printed Date</td>
          <td><?php print render($printed_date); ?></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>