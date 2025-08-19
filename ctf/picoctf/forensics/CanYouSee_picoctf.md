# Challenge Writeup: CanYouSee

## Steps to Solve the Challenge

### Step 1: Analyze the File Metadata

We were given a JPEG file named `ukn_reality.jpg`. To investigate potential hidden information, we first checked the file type and metadata.

1. Run the `file` command to determine the file type:
   ```
   file ukn_reality.jpg
   ```
   
   **Output**:
   ```
   ukn_reality.jpg: JPEG image data, JFIF standard 1.01, resolution (DPI), density 72x72, segment length 16, baseline, precision 8, 4308x2875, components 3
   ```

   This confirmed that the file was indeed a JPEG image.

2. Next, we used `exiftool` to extract metadata from the image:
   ```
   exiftool ukn_reality.jpg
   ```

   Among the metadata, we found the following attribute:
   ```
   Attribution URL                 : cGljb0NURntNRTc0RDQ3QV9ISUREM05fZGVjYTA2ZmJ9Cg==
   ```

This looked like a Base64-encoded string that could contain the flag.

### Step 2: Decode the Base64 String

To decode the `Attribution URL`, we used the following command:

   ```
   echo "cGljb0NURntNRTc0RDQ3QV9ISUREM05fZGVjYTA2ZmJ9Cg==" | base64 -d
   ```

**Output**:
   ```
   picoCTF{ME74D47A_HIDD3N_deca06fb}
   ```

### Conclusion

The complete flag for this challenge is:
   ```
   picoCTF{ME74D47A_HIDD3N_deca06fb}
   ```

This challenge demonstrates how metadata can hide information in plain sight, often encoded in formats like Base64. By extracting and decoding it, we were able to retrieve the flag.
