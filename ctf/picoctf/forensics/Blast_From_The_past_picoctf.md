# Challenge Writeup: Blast from the Past

## Challenge Description
The goal of this challenge was to modify the timestamps of a given JPEG image file to a specific date and time: `1970:01:01 00:00:00.001+00:00` or an equivalent time in another timezone. After modifying the timestamps, we needed to submit the modified image to receive the flag.

## Steps to Solve the Challenge

### Step 1: Analyze the File Metadata

We started by examining the metadata of `original.jpg` using `exiftool` to identify all date-related fields.

Run `exiftool` on `original.jpg` to view the timestamps:
   ```
   exiftool original.jpg
   ```
   
   **Relevant Output**:
   ```
   File Modification Date/Time     : 2024:11:02 12:05:06+00:00  
   Date/Time Original              : 2023:11:20 15:46:23.703  
   Create Date                     : 2023:11:20 15:46:23.703  
   Modify Date                     : 2023:11:20 15:46:23.703  
   Time Stamp                      : 2023:11:20 20:46:21.420+00:00  
   ```
   
   This output showed several date fields that needed to be modified to the specified timestamp.

### Step 2: Modify the Timestamps Using ExifTool

To set all relevant date fields to `1970:01:01 00:00:00.001+00:00`, we used the following command with `exiftool`:

   ```
   exiftool -AllDates='1970:01:01 00:00:00.001' \
            -CreateDate='1970:01:01 00:00:00.001' \
            -DateTimeOriginal='1970:01:01 00:00:00.001' \
            -ModifyDate='1970:01:01 00:00:00.001' \
            -SubSecCreateDate='1970:01:01 00:00:00.001' \
            -SubSecDateTimeOriginal='1970:01:01 00:00:00.001' \
            -SubSecModifyDate='1970:01:01 00:00:00.001' original.jpg
   ```

This command updates all the relevant date fields to match the specified timestamp.

### Step 3: Modify the UTC Data in Hex Editor

Next, we needed to modify specific image metadata that wasn’t accessible through `exiftool`. Using a hex editor like `ghex`, we located the timestamp data in hexadecimal format.

1. Open the image in `ghex`:
   ```
   ghex original.jpg
   ```

2. Find the section containing the timestamp, typically marked by hex values `74 61`. After these bytes, replace the next values with `30 30 30 30 31` to represent the correct timestamp.

### Step 4: Submit the Modified Image

Finally, we submitted the modified image to the server using `nc`:

   ```
   nc -w 2 mimas.picoctf.net 54862 < original_modified.jpg
   ```

After submission, we received the flag:

   ```
   picoCTF{71m3_7r4v311ng_p1c7ur3_3e336564}
   ```

## Conclusion

The complete flag for this challenge is:
   ```
   picoCTF{71m3_7r4v311ng_p1c7ur3_3e336564}
   ```

This challenge involved modifying image timestamps both through metadata editing and direct hex editing, demonstrating the importance of precise control over file attributes.
