# Challenge "Operation Orchid" Writeup

## Vulnerability: Encryption Key Recovery from Bash History

### Where: Encryption password exposed in `.ash_history` on disk image

### Impact: This challenge demonstrates how encryption can be compromised if passwords are stored or exposed in command history files, like `.ash_history`. By recovering the password, we were able to decrypt a sensitive file.

**NOTE**: The challenge involves analyzing a disk image to recover an encryption password from command history and using it to decrypt an encrypted file.

## Steps to reproduce:

1. **Open the Disk Image in Autopsy**:
   - We received a `disk.img` file.
   - Using Autopsy, we opened `disk.img` to explore its contents and identify files of interest.

2. **Locate the Encrypted Flag File**:
   - In `vol4`, under the `/root/` directory, we found a file named `flag.txt.enc`. We also observed that `flag.txt` had been deleted, suggesting the encrypted file might contain the flag.
   - Additionally, we found a `.ash_history` file, which contained a record of recent commands executed on the system.

3. **Retrieve the Encryption Password from .ash_history**:
   - By examining `.ash_history`, we found the exact command used to encrypt `flag.txt`:

     ```
     openssl aes256 -salt -in flag.txt -out flag.txt.enc -k unbreakablepassword1234567
     ```

   - This command revealed the encryption method (AES-256) and the password: `unbreakablepassword1234567`.

4. **Decrypt the Encrypted File**:
   - We downloaded `flag.txt.enc` and used the recovered password to decrypt it with OpenSSL:

     ```
     openssl aes-256-cbc -d -in flag.txt.enc -out flag_decoded.txt -k unbreakablepassword1234567
     ```

   - After running this command, we successfully decrypted the file and extracted the flag.

5. **Retrieve the Flag**:
   - Viewing `flag_decoded.txt`, we found the flag:

     ```
     picoCTF{h4un71ng_p457_5113beab}
     ```

## Conclusion:

By examining the `.ash_history` file, we retrieved the password used to encrypt `flag.txt`. This allowed us to decrypt `flag.txt.enc` and recover the flag. This challenge highlights the importance of securing command history files, as they may contain sensitive information such as encryption keys.
