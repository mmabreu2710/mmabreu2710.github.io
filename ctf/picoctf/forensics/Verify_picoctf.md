# Challenge Verify Writeup

**Challenge Description**:  
People keep trying to trick my players with imitation flags. I want to make sure they get the real thing! I’m going to provide the SHA-256 hash and a decrypt script to help you know that my flags are legitimate.

---

## Steps to Solve the Challenge

1. **Access the Challenge Instance**:  
   Use SSH to connect to the challenge instance using the provided credentials. This instance contains the `challenge.zip` file, which includes everything you need to solve the challenge.

2. **Check the SHA-256 Hash**:
   - Extract the contents of `challenge.zip`.
   - Locate the `checksum.txt` file inside. This file contains the SHA-256 hash for the legitimate flag.
   - Take note of this hash, as we’ll use it to verify the correct file.

3. **Check Files Against the Checksum**:
   - Navigate to the `files` directory where multiple files are stored. To find the legitimate flag file, follow these commands:
   
   ```
   sha256sum files/*
   ```
   
   - Use `grep` to find the file that matches the hash from `checksum.txt`. Replace checksum with the actual hash from the file:
   
   ```
   sha256sum files/* | grep 03b52eabed517324828b9e09cbbf8a7b0911f348f76cf989ba6d51acede6d5d8
   ```
   
   - Note the filename that matches the checksum, as this is the verified flag file. For example, let's assume `d4c56911` matches the checksum.

4. **Verify the File Type**:
   - To confirm you’re working with the correct file, check its contents using the `file` command:
   
   ```
   file files/d4c56911
   ```

5. **Decrypt the File to Obtain the Flag**:
   - Run the `decrypt.sh` script on the verified file:
   
   ```
   ./decrypt.sh files/d4c56911
   ```

   - The output will display the correct flag.

---

## Example Output

If the challenge was solved successfully, the output should resemble:
```
picoCTF{trust_but_verify_d4c56911}
```

Congratulations! You have completed the challenge.
