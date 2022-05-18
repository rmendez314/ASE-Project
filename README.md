# ASE-Project


# add-device:
#### URL: https://ec2-54-146-181-156.compute-1.amazonaws.com/API/?add-device&name=
* Input:
  * name:
    * required
    * name of the device you want to add
* Output (JSON):
  * 200:
    * ```
      {
        "Status: OK",
        "MSG: Successfully added device: ",
        ""
      }
      ```
  * 404:
    * ```
      {
        "Status: Error",
        "Data: Endpoint not found",
        " "
      }
      ```
# delete-device:
####URL: https://ec2-54-146-181-156.compute-1.amazonaws.com/API/?delete-device
* Input:
  * name:
    * required
    * name of the device you want to delete
* Output (JSON):
  * 200:
    * ```
      {
         "Status: OK",
         "MSG: Successfully added device: ",
         ""
      }
      ```
  * 404:
      * ```
        {
           "Status: Error",
           "Data: Endpoint not found",
           " "
        }
        ```
  
# list-devices:
#### URL: https://ec2-54-146-181-156.compute-1.amazonaws.com/API/?list-devices
* Input:
  * None Required
* Output (JSON):
  * 200:
      * ```
        {
           "auto_id": int,
           "device_type": string
        }
        ```
  * 404:
      * ```
        {
           "Status: Error",
           "Data: Endpoint not found",
           " "
        }
        ```


# list-manufacturers:
#### URL: https://ec2-54-146-181-156.compute-1.amazonaws.com/API/?list-manufacturers
* Input:
  * None Required
* Output (JSON):
  * 200:
    * ```
      {
         "auto_id": int,
         "manufacturer": string
      }
      ```
  * 404:
     * ```
       {
          "Status: Error",
          "Data: Endpoint not found",
          " "
       }
       ```
  
# list-products:
#### URL: https://ec2-54-146-181-156.compute-1.amazonaws.com/API/?list-products
* Input:
  * None
* Output: 
  * 200:
    * ```
      {
         "auto_id": int,
         "SN": "SN-[35]{a-zA-Z0-9},
         "device_type": string,
         "manufacturer": string,
         "is_active": int [0-1]
      }
      ```
  * 404: 
    * ```
      {
         "Status: Error",
         "Data: Endpoint not found",
         " "
      }
      ```
# search-product-SN
#### URL: https://ec2-54-146-181-156.compute-1.amazonaws.com/API/?search-product-SN&SN=
* Input: 
  * SN:
    * Required.
    * Must begin with "SN-"
    * i.e. SN-838d0ae74d7dd5321b18f1fd0888013c
* Output (JSON):
  * 200:
    * ```
      {
         "auto_id": int,
         "SN": "SN-[35]{a-zA-Z0-9},
         "device_type": string,
         "manufacturer": string,
         "is_active": int [0-1]
      }

  * 200: 
    * ```
      {
        "Status: Invalid Data",
        "MSG: Null Product ID",
        " "
      }
      ```
  * 404:
    * ```
      {
        "Status: Error",
        "Data: Endpoint not found",
        " "
      }
      ```
   
# update-product
#### URL: https://ec2-54-146-181-156.compute-1.amazonaws.com/API/?update-product&SN=[string]&device=[int]&manufacturer=[int]&is_active=[int]
* Input:
  * SN:
      * Required.
      * Must begin with "SN-"
      * i.e. SN-838d0ae74d7dd5321b18f1fd0888013c
  * device:
    * Not Required
    * Int
    * Must be a valid device id
  * manufacturer:
    * Not Require
    * Int
    * Must be a valid manufacturer id
  * is_active:
    * Not Required
    * Int
    * 1 or 0
    * default is 0 if the input is null
* Output (JSON):
    * 200:
        * ```
          {
            "auto_id": int,
            "SN": "SN-[35]{a-zA-Z0-9},
            "device_type": string,
            "manufacturer": string,
            "is_active": int [0-1]
          }
          ```
    * 200:
        * ```
          {
            "Status: Invalid Data",
            "MSG: Null Product ID",
            " "
          }
          ```
    * 404:
        * ```
          {
            "Status: Error",
            "Data: Endpoint not found",
            " "
          }
          ```
# upload-file
#### URL: https://ec2-54-146-181-156.compute-1.amazonaws.com/API/?upload-file&
* Input:
  * SN:
    * Required.
    * Must begin with "SN-"
    * i.e. SN-838d0ae74d7dd5321b18f1fd0888013c
  * File Contents:
    * Required
    * name
    * path
    * size
    * type
* Output: 
  * 400:
    * ```
      {
        "Status: Invalid Data",
        "MSG: File upload failed",
        ""
      }
      ```
  * 500:
    * ```
      {
         "Status: Error";
         "MSG: Something went wrong";
         "";
      }
      ```
  * 200:
    * ```
      {
         "Status: Success",
         "MSG: File uploaded",
         "",
      }
      ```

# view-device
#### URL: https://ec2-54-146-181-156.compute-1.amazonaws.com/API/?view-device&did=[int]
* Input:
  * did:
    * Required
    * Int
    * Must be a valid device id
* Output (JSON):
  * 200:
    * ```
      {
         "auto_id": int,
         "device_type": string,
      }
      ```
  * 200:
      * ```
        {
           "Status: Invalid Data",
           "MSG: Device ID must be numbers only",
           ""
        }
        ```
  * 404:
    * ```
      {
         "Status: Error",
         "Data: Endpoint not found",
         " "
      }
      ```
# view-product
#### URL: https://ec2-54-146-181-156.compute-1.amazonaws.com/API/?view-product
* Input:
    * pid:
        * Required
        * Int
        * Must be a valid product id
* Output (JSON):
    * 200:
        * ```
          {
             "auto_id": int,
             "device_type": string,
          }
          ```
    * 200: 
      * ```
        {
           "Status: Invalid Data",
           "MSG: Product ID must be numbers only",
           ""
        }
        ```
    * 404:
        * ```
          {
            "Status: Error",
            "Data: Endpoint not found",
            " "
          }
          ```
