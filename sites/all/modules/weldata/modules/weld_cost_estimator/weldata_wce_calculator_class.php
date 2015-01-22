<?php
class weldataCalculator {

function my_super_performant_field_value_getter($entity, $field_collection ,$field_name) {
  return isset($entity->{$field_collection}->{$field_name}[LANGUAGE_NONE]) ? $entity->{$field_collection}->{$field_name}[LANGUAGE_NONE] : FALSE;
}

}
