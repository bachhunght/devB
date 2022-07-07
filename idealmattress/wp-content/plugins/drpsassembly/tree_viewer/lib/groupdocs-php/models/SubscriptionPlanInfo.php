<?php
/**
 *  Copyright 2012 GroupDocs.
 *
 *  Licensed under the Apache License, Version 2.0 (the "License");
 *  you may not use this file except in compliance with the License.
 *  You may obtain a copy of the License at
 *
 *      http://www.apache.org/licenses/LICENSE-2.0
 *
 *  Unless required by applicable law or agreed to in writing, software
 *  distributed under the License is distributed on an "AS IS" BASIS,
 *  WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 *  See the License for the specific language governing permissions and
 *  limitations under the License.
 */

/**
 * 
 *
 * NOTE: This class is auto generated by the swagger code generator program. Do not edit the class manually.
 *
 */
class SubscriptionPlanInfo {

  static $swaggerTypes = array(
      'productId' => 'int',
      'name' => 'string',
      'userCount' => 'int',
      'firstNameOnCard' => 'string',
      'lastNameOnCard' => 'string',
      'number' => 'string',
      'expirationDate' => 'DateTime',
      'cvv' => 'string',
      'address' => 'BillingAddressInfo',
      'price' => 'float',
      'currencyCode' => 'string',
      'billingPeriod' => 'int',
      'promoCode' => 'string'

    );

  public $productId; // int
  public $name; // string
  public $userCount; // int
  public $firstNameOnCard; // string
  public $lastNameOnCard; // string
  public $number; // string
  public $expirationDate; // DateTime
  public $cvv; // string
  public $address; // BillingAddressInfo
  public $price; // float
  public $currencyCode; // string
  public $billingPeriod; // int
  public $promoCode; // string
  }
