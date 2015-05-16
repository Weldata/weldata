<?php
class weldataCalculator {

  /**
   * Function to Calculate
   */
  function calculator($entity_type, $entity){

    //Entity Metadata Wrapper to get Field Collection Values
    $wrapper = entity_metadata_wrapper($entity_type, $entity);
    //Common Variables
    //$unit = field_get_items($entity_type, $entity, 'field_unit')[0]['value'];
    $type_of_weld = field_get_items($entity_type, $entity, 'field_type_of_weld')[0]['value'];
    $filler_density = field_get_items($entity_type, $entity, 'field_filler_density')[0]['value'];
    $number_of_joints = field_get_items($entity_type, $entity, 'field_number_of_joints')[0]['value'];

    $labour_rate = field_get_items($entity_type, $entity, 'field_labour_rate')[0]['value'];
    $filler_cost = field_get_items($entity_type, $entity, 'field_filler_cost')[0]['value'];
    $wire_diameter = field_get_items($entity_type, $entity, 'field_wire_diameter')[0]['value'];
    $wire_feed_speed = field_get_items($entity_type, $entity, 'field_wire_feed_speed')[0]['value'];
    $gas_cost = field_get_items($entity_type, $entity, 'field_gas_cost')[0]['value'];
    $gas_flow = field_get_items($entity_type, $entity, 'field_gas_flow')[0]['value'];
    $process_efficiency = (field_get_items($entity_type, $entity, 'field_process_efficiency')[0]['value'])/100;
    $welder_efficiency = (field_get_items($entity_type, $entity, 'field_welder_efficiency')[0]['value'])/100;
    $amperage = field_get_items($entity_type, $entity, 'field_amperage')[0]['value'];
    $voltage = field_get_items($entity_type, $entity, 'field_voltage')[0]['value'];
    $power_cost = field_get_items($entity_type, $entity, 'field_power_cost')[0]['value'];
    $throat = field_get_items($entity_type, $entity, 'field_throat');

    /**
     * Variable Declarations for Fillet Welds
     */
    switch($type_of_weld) {
      case "fillet":
        $weight_of_weld = $this->fillet_weld($wrapper, $filler_density, $number_of_joints);
        break;

      case "groove":
        $type_of_groove_weld = $wrapper->field_groove_weld->field_type_of_groove_weld->value();
        switch($type_of_groove_weld){
          case "single_v":
            $weight_of_weld = $this->single_vee($wrapper, $filler_density, $number_of_joints);
            break;
          case "single_bevel":
            $weight_of_weld = $this->single_bevel($wrapper,$filler_density,$number_of_joints);
            break;
          case "compound_v":
            $weight_of_weld = $this->compound_vee($wrapper,$filler_density,$number_of_joints);
            break;
          case "double_v":
            $weight_of_weld = $this->double_vee($wrapper,$filler_density,$number_of_joints);
            break;
          case "j_groove":
            $weight_of_weld = $this->j_groove($wrapper,$filler_density,$number_of_joints);
            break;
        }
        break;//End of groove weld
      case "fillet_groove":
        $type_of_fillet_groove_weld = $wrapper->field_fillet_groove_weld->field_type_of_fillet_groove_weld->value();
        switch($type_of_fillet_groove_weld){
          case "double_bevel_tee":
            $weight_of_weld = $this->double_bevel_tee($wrapper,$filler_density,$number_of_joints);
            break;
          case "double_bevel_corner":
            $weight_of_weld = $this->double_bevel_corner($wrapper,$filler_density,$number_of_joints);
            break;
        }
        break; //End of Fillet and Groove Weld
      case "plug_slot":
        $type_of_plug_weld = $wrapper->field_plug_slot_weld->field_type_of_plug_weld->value();
        switch($type_of_plug_weld){
          case "plug":
            $weight_of_weld = $this->plug($wrapper,$filler_density,$number_of_joints);
            break;
          case "slot":
            $weight_of_weld = $this->slot($wrapper,$filler_density,$number_of_joints);
            break;
        }
        break; //End of plug_slot

      case "patch": //Implementation of "OR" statement in switch
      case "cavity":
        $weight_of_weld = $this->patch_cavity($wrapper,$filler_density,$number_of_joints);
        break;
      case "pipe_clad":
        $weight_of_weld = $this->pipe_clad($wrapper,$filler_density,$number_of_joints);
        break;
    }

    $deposition_rate = M_PI * (($wire_diameter * $wire_diameter)/4) * ($wire_feed_speed * 60) * $filler_density;
    $weight_of_filler_required = $weight_of_weld / ($process_efficiency);
    $arc_on_hours = $weight_of_weld / ($process_efficiency * $deposition_rate);
    $labour_hours = $arc_on_hours / ($welder_efficiency /100);
    $total_filler_cost = $weight_of_filler_required * $filler_cost;
    $labour_cost = $labour_hours * $labour_rate;
    $total_gas_cost = $arc_on_hours * $gas_flow * $gas_cost;
    $total_power_cost = ($voltage * $amperage * $arc_on_hours * $power_cost) / 1000;
    $total_cost = $total_filler_cost + $labour_cost + $total_gas_cost + $total_power_cost;

    $GLOBALS['result'] = array(
      'unit' => 'metric',
      'weight_of_weld' => $weight_of_weld,
      'weight_of_filler_required' => $weight_of_filler_required,
      'arc_on_hours' => $arc_on_hours,
      'labour_hours' => $labour_hours,
      'total_filler_cost' => $total_filler_cost,
      'labour_cost'=> $labour_cost,
      'total_gas_cost'=> $total_gas_cost,
      'total_power_cost'=> $total_power_cost,
      'total_cost' => $total_cost
    );
    return $GLOBALS['result'];
  }

  /**
   * Calculate Weight of Weld for Compound Vee Weld.
   */
  function compound_vee($wrapper,$filler_density,$number_of_joints){

    $length = $wrapper->field_groove_weld->field_weld_length->value();
    $bevel_angle = $wrapper->field_groove_weld->field_bevel_angle->value();
    $bevel_angle_bottom = $wrapper->field_groove_weld->field_bevel_angle_bottom->value();
    $thickness = $wrapper->field_groove_weld->field_thickness->value();
    $thickness_bottom = $wrapper->field_groove_weld->field_thickness_bottom->value();
    $land_thickness = $wrapper->field_groove_weld->field_land_thickness->value();
    $root_gap = $wrapper->field_groove_weld->field_root_gap->value();
    $cap_height = $wrapper->field_groove_weld->field_cap_height->value();

    $cap_width = (($thickness_bottom * tan(deg2rad($bevel_angle_bottom))*2)+($thickness * tan(deg2rad($bevel_angle))*2)) + $root_gap;
    $area = array();
    $area[0] = ($thickness * $thickness * tan(deg2rad($bevel_angle)));
    $area[1] = ($thickness_bottom * $thickness_bottom * tan(deg2rad($bevel_angle_bottom)));
    $area[2] = $root_gap * ($thickness + $thickness_bottom + $land_thickness);
    $area[3] = 2 * $thickness_bottom * $thickness * tan(deg2rad($bevel_angle));
    $area[4] = 0.8 * $cap_height * $cap_width;

    $volume = array_sum($area) * $length * $number_of_joints;
    $weight_of_weld = $volume * $filler_density;
    return $weight_of_weld;
  }

  /**
   * Calculate Weight of Weld for Double Bevel Corner Weld.
   */
  function double_bevel_corner($wrapper,$filler_density,$number_of_joints){

    $length = $wrapper->field_groove_weld->field_weld_length->value();
    $bevel_angle = $wrapper->field_groove_weld->field_bevel_angle->value();
    $bevel_angle_bottom = $wrapper->field_groove_weld->field_bevel_angle_bottom->value();
    $thickness = $wrapper->field_groove_weld->field_thickness->value();
    $thickness_bottom = $wrapper->field_groove_weld->field_thickness_bottom->value();
    $land_thickness = $wrapper->field_groove_weld->field_land_thickness->value();
    $root_gap = $wrapper->field_groove_weld->field_root_gap->value();
    $cap_height = $wrapper->field_groove_weld->field_cap_height->value();
    $leg_size = $wrapper->field_groove_weld->field_leg_size->value();

    $area = array();
    $area[0] = ($thickness * $thickness * tan(deg2rad($bevel_angle)))/2;
    $area[1] = ($thickness_bottom * $thickness_bottom * tan(deg2rad($bevel_angle_bottom)))/2;
    $area[2] = $root_gap * ($thickness + $thickness_bottom + $land_thickness);
    $area[3] = ($leg_size * $leg_size)/2;
    $area[4] = $cap_height * (($thickness_bottom * tan(deg2rad($bevel_angle_bottom))) + $root_gap);

    $volume = array_sum($area) * $length * $number_of_joints;
    $weight_of_weld = $volume * $filler_density;
    return $weight_of_weld;
  }

  /**
   * Calculate Weight of Weld for Double Bevel Tee Weld.
   */
  function double_bevel_tee($wrapper,$filler_density,$number_of_joints){

    $length = $wrapper->field_groove_weld->field_weld_length->value();
    $bevel_angle = $wrapper->field_groove_weld->field_bevel_angle->value();
    $bevel_angle_bottom = $wrapper->field_groove_weld->field_bevel_angle_bottom->value();
    $thickness = $wrapper->field_groove_weld->field_thickness->value();
    $thickness_bottom = $wrapper->field_groove_weld->field_thickness_bottom->value();
    $land_thickness = $wrapper->field_groove_weld->field_land_thickness->value();
    $root_gap = $wrapper->field_groove_weld->field_root_gap->value();
    $leg_size = $wrapper->field_groove_weld->field_leg_size->value();
    $leg_size_2 = $wrapper->field_groove_weld->field_leg_size_2->value();


    $area = array();
    $area[0] = ($thickness * $thickness * tan(deg2rad($bevel_angle)))/2;
    $area[1] = ($thickness_bottom * $thickness_bottom * tan(deg2rad($bevel_angle_bottom)))/2;
    $area[2] = $root_gap * ($thickness + $thickness_bottom + $land_thickness);
    $area[3] = ($leg_size * $leg_size)/2;
    $area[4] = ($leg_size_2 * $leg_size_2)/2;

    $volume = array_sum($area) * $length * $number_of_joints;
    $weight_of_weld = $volume * $filler_density;
    return $weight_of_weld;
  }

  /**
   * Calculate Weight of Weld for Double Vee Weld.
   */
  function double_vee($wrapper,$filler_density,$number_of_joints){

    $length = $wrapper->field_groove_weld->field_weld_length->value();
    $bevel_angle = $wrapper->field_groove_weld->field_bevel_angle->value();
    $bevel_angle_bottom = $wrapper->field_groove_weld->field_bevel_angle_bottom->value();
    $thickness = $wrapper->field_groove_weld->field_thickness->value();
    $thickness_bottom = $wrapper->field_groove_weld->field_thickness_bottom->value();
    $land_thickness = $wrapper->field_groove_weld->field_land_thickness->value();
    $root_gap = $wrapper->field_groove_weld->field_root_gap->value();
    $cap_height = $wrapper->field_groove_weld->field_cap_height->value();
    $cap_height_bottom = $wrapper->field_groove_weld->field_cap_height->value();

    $cap_width = (($thickness_bottom * tan(deg2rad($bevel_angle_bottom))*2)+($thickness * tan(deg2rad($bevel_angle))*2)) + $root_gap;
    $area = array();
    $area[0] = ($thickness * $thickness * tan(deg2rad($bevel_angle)));
    $area[1] = ($thickness_bottom * $thickness_bottom * tan(deg2rad($bevel_angle_bottom)));
    $area[2] = $root_gap * ($thickness + $thickness_bottom + $land_thickness);
    $area[3] = 0.8 * $cap_height * $cap_width;
    $area[4] = 0.8 * $cap_height * [(2 * $thickness * tan(deg2rad($bevel_angle))) + $root_gap];
    $area[5] = 0.8 * $cap_height_bottom * ((2 * $thickness_bottom * tan(deg2rad($bevel_angle_bottom))) + $root_gap);

    $volume = array_sum($area) * $length * $number_of_joints;
    $weight_of_weld = $volume * $filler_density;
    return $weight_of_weld;
  }

  /**
   * Calculate Weight of Weld for Fillet Weld.
   */
  function fillet_weld( $wrapper, $filler_density, $number_of_joints){

    $weld_length = $wrapper->field_fillet_weld->field_weld_length->value();
    $leg_size = $wrapper->field_fillet_weld->field_leg_size->value();
    $size_variation = ($wrapper->field_fillet_weld->field_size_variation->value())/100;

    $area = 0.5 * $leg_size * $leg_size * $weld_length * $number_of_joints * $filler_density;
    $weight_of_weld =  ($area + ($area * $size_variation)) * $number_of_joints;
    return $weight_of_weld;
  }

  /**
   * Calculate Weight of Weld for J Groove Weld.
   */
  function j_groove($wrapper,$filler_density,$number_of_joints){

    $length = $wrapper->field_groove_weld->field_weld_length->value();
    $bevel_angle = $wrapper->field_groove_weld->field_bevel_angle->value();
    $extension = $wrapper->field_groove_weld->field_extension->value();
    $thickness = $wrapper->field_groove_weld->field_thickness->value();
    $extension_thickness = $wrapper->field_groove_weld->field_extension_thickness->value();
    $root_gap = $wrapper->field_groove_weld->field_root_gap->value();
    $cap_height = $wrapper->field_groove_weld->field_cap_height->value();
    $radius = ($wrapper->field_groove_weld->field_diameter->value())/2;

    $l1 = $thickness - $extension_thickness - $radius;
    $area = array();
    $area[0] = ($l1 * $l1 * tan(deg2rad($bevel_angle)))/2;
    $area[1] = (M_PI * $radius * $radius)/4;
    $area[2] = $radius * $l1;
    $area[3] = $extension * ($thickness - $extension_thickness);
    $area[4] = $root_gap * $thickness;
    $area[5] = (($l1  * tan(deg2rad($bevel_angle))) + $radius + $extension + $root_gap) * $cap_height * 0.72;

    $volume = array_sum($area) * $length * $number_of_joints;
    $weight_of_weld = $volume * $filler_density;
    return $weight_of_weld;
  }

  /**
   * Calculate Weight of Weld for Patch Build Up and Cavity Build Up.
   */
  function patch_cavity($wrapper,$filler_density,$number_of_joints){

    $top_length = $wrapper->field_groove_weld->field_top_length->value();
    $top_width = $wrapper->field_groove_weld->field_top_width->value();
    $height_of_patch = $wrapper->field_groove_weld->field_thickness->value();
    $bottom_length = $wrapper->field_groove_weld->field_bottom_length->value();
    $bottom_width = $wrapper->field_groove_weld->field_bottom_width->value();

    $a = ($bottom_length - $top_length)/2;
    $b = ($bottom_width - $top_width)/2;
    //$a = atan($height_of_patch/$a);
    //$b = atan($height_of_patch/$b);
    $volume = array();
    $volume[0] = ($top_length * $top_width * $height_of_patch);
    $volume[1] = ($a * $bottom_length * $height_of_patch);
    $volume[2] = ($b * $bottom_width * $height_of_patch);
    $weight_of_weld = array_sum($volume) * $filler_density * $number_of_joints;
    return $weight_of_weld;
  }

  /**
   * Calculate Weight of Weld for Pipe Clad.
   */
  function pipe_clad($wrapper,$filler_density,$number_of_joints){

    $clad_length = $wrapper->field_groove_weld->field_weld_length->value();
    $diameter = $wrapper->field_groove_weld->field_diameter->value();
    $clad_thickness = $wrapper->field_groove_weld->field_thickness->value();

    $volume = ($clad_length * $clad_thickness * $diameter) * $number_of_joints;
    $weight_of_weld = $volume * $filler_density;
    return $weight_of_weld;
  }

  /**
   * Calculate Weight of Weld for Plug Weld.
   */
  function plug($wrapper,$filler_density,$number_of_joints){

    $length = $wrapper->field_groove_weld->field_weld_length->value();
    $diameter = $wrapper->field_groove_weld->field_diameter->value();


    $area = (M_PI * $diameter * $diameter)/4;

    $volume = $area * $length * $number_of_joints;
    $weight_of_weld = $volume * $filler_density;
    return $weight_of_weld;
  }

  /**
   * Calculate Weight of Weld for Single Bevel Weld.
   */
  function single_bevel($wrapper,$filler_density,$number_of_joints){

    $length = $wrapper->field_groove_weld->field_weld_length->value();
    $bevel_angle = $wrapper->field_groove_weld->field_bevel_angle->value();
    $thickness = $wrapper->field_groove_weld->field_thickness->value();
    $root_gap = $wrapper->field_groove_weld->field_root_gap->value();
    $cap_height = $wrapper->field_groove_weld->field_cap_height->value();

    $cap_width = ($thickness * tan(deg2rad($bevel_angle)))+ $root_gap;
    $area = array();
    $area[0] = ($thickness * $thickness * tan(deg2rad($bevel_angle)));
    $area[1] = ($root_gap * $thickness);
    $area[2] = (0.72 * $cap_height * $cap_width);
    $weight_of_weld =  array_sum($area) * $length * $filler_density * $number_of_joints;
    return $weight_of_weld;
  }

  /**
   * Calculate Weight of Weld for Single Vee Weld.
   */
  function single_vee($wrapper, $filler_density, $number_of_joints){

    $length = $wrapper->field_groove_weld->field_weld_length->value();
    $bevel_angle = $wrapper->field_groove_weld->field_bevel_angle->value();
    $thickness = $wrapper->field_groove_weld->field_thickness->value();
    $root_gap = $wrapper->field_groove_weld->field_root_gap->value();
    $cap_height = $wrapper->field_groove_weld->field_cap_height->value();


    $l1 = $thickness * tan(deg2rad($bevel_angle));
    $cap_width = $l1 + $l1 + $root_gap;
    $area = array();
    $area[0] = ($l1 * $thickness)/2;
    $area[1] = ($root_gap * $thickness);
    $area[2] = (0.72 * $cap_height * $cap_width);
    $weight_of_weld =  array_sum($area) * $length * $filler_density * $number_of_joints;
    return $weight_of_weld;
  }

  /**
   * Calculate Weight of Weld for Slot Weld.
   */
  function slot($wrapper,$filler_density,$number_of_joints){

    $slot_length = $wrapper->field_groove_weld->field_weld_length->value();
    $slot_width = $wrapper->field_groove_weld->field_top_width->value();
    $thickness = $wrapper->field_groove_weld->field_thickness->value();

    $volume = (((M_PI * $slot_width * $slot_width)/4) + ($slot_length * $slot_width)) * $thickness * $number_of_joints;
    $weight_of_weld = $volume * $filler_density;
    return $weight_of_weld;
  }

}