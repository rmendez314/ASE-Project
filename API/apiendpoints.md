* add-device:
  * URL: :https://ec2-54-146-181-156.compute-1.amazonaws.com/API/?add-device
  * Input:
      * name
          * required
          * name of the device you want to add
  * Output:
      * None
* delete-device:
  * URL: :https://ec2-54-146-181-156.compute-1.amazonaws.com/API/?delete-device
  * Input:
      * name
          * required
          * name of the device you want to delete
  * Output:
      * None
* list-devices:
  * URL: :https://ec2-54-146-181-156.compute-1.amazonaws.com/API/?list-devices
  * Input:
      * None Required
  * Output (JSON):
      * 200 OK {
        "auto_id": int,
        "device_type": string,
        }
* list-manufacturers:
    * URL: :https://ec2-54-146-181-156.compute-1.amazonaws.com/API/?list-manufacturers
    * Input:
        * None Required
    * Output (JSON):
        * 200 OK {
          "auto_id": int,
          "device_type": string,
          }
* list-products:

* ViewDevice:
* URL: https://ec2-3-142-198-107.us-east-2.compute.amazonaws.com/api/
* Inputs:
    * device_id
        * not required
        * ID of the type of device for the requested equipment
    * manufacturer_id
        * not required
        * ID of the manufacturer for the requested equipment
    * serial_number
        * required