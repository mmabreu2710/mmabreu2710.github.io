# Challenge "Operation Oni" Writeup

## Vulnerability: Private Key Exposure in Disk Image

### Where: Private SSH key found in a disk image, allowing unauthorized SSH access

### Impact: This challenge demonstrates the importance of securing sensitive files like SSH keys. If left exposed on a disk, these keys can be extracted and used to gain unauthorized access to a system.

**NOTE**: The challenge involves extracting a private SSH key from a disk image and using it to SSH into a server to retrieve the flag.

## Steps to reproduce:

1. **Download and Decompress the Disk Image**:
   - We launched the instance provided by the challenge and downloaded the disk image, which was compressed in `.gz` format.
   - To decompress it, we used the `gunzip` command:

     ```
     gunzip disk.img.gz
     ```

   - This resulted in an uncompressed `disk.img` file.

2. **Analyze the Disk Image Using Autopsy**:
   - We opened the disk image in Autopsy, a forensic analysis tool, and navigated through the file structure.
   - By exploring the `/2/` directory, we located two files of interest under the root user’s directory: 
     - `.bash_history` - a standard history file.
     - `.ssh/` directory - containing SSH-related files.

3. **Extract the Private Key**:
   - Within the `.ssh` directory, we found a private key file that could be used to authenticate via SSH.
   - We exported this key from Autopsy and saved it as `key_file`.

4. **Adjust Permissions and SSH into the Server**:
   - To use the SSH key, we adjusted its permissions to make it secure using:

     ```
     chmod 600 key_file
     ```

   - We then connected to the server using the extracted key with the following command:

     ```
     ssh -i key_file -p 65218 ctf-player@saturn.picoctf.net
     ```

5. **Retrieve the Flag**:
   - Upon connecting to the server, we obtained the flag:

     ```
     picoCTF{k3y_5l3u7h_339601ed}
     ```

## Conclusion:

By analyzing the disk image and extracting the private SSH key, we were able to gain access to the server and retrieve the flag. This challenge underscores the need for careful management and protection of sensitive files, especially SSH keys, on disk images.
