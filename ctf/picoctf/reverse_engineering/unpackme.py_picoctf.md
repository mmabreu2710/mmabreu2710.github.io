# Challenge "Unpackme.py" Writeup

## Vulnerability: Fernet-encrypted Payload Decryption

### Where: Python script with embedded encrypted payload

### Impact: This challenge demonstrates how encrypted data can be reversed if the decryption key is accessible in the script.

**NOTE**: The challenge involves reversing a Python script to decrypt an encrypted payload and retrieve the flag.

---

## Steps to reproduce:

1. **Analyze the Provided Python Script**:

   The provided Python script decrypts an encrypted payload and executes it. The key is embedded in the script, which allows us to decrypt the payload without directly running the `exec()` function.

   Provided code:
   ```
   import base64
   from cryptography.fernet import Fernet

   payload = b'gAAAAABkzWGO_8MlYpNM0n0o718LL-w9m3rzXvCMRFghMRl6CSZwRD5DJOvN_jc8TFHmHmfiI8HWSu49MyoYKvb5mOGm_Jn4kkhC5fuRiGgmwEpxjh0z72dpi6TaPO2TorksAd2bNLemfTaYPf9qiTn_z9mvCQYV9cFKK9m1SqCSr4qDwHXgkQpm7IJAmtEJqyVUfteFLszyxv5-KXJin5BWf9aDPIskp4AztjsBH1_q9e5FIwIq48H7AaHmR8bdvjcW_ZrvhAIOInm1oM-8DjamKvhh7u3-lA=='

   key_str = 'correctstaplecorrectstaplecorrec'
   key_base64 = base64.b64encode(key_str.encode())
   f = Fernet(key_base64)
   plain = f.decrypt(payload)
   exec(plain.decode())
   ```

2. **Reverse the Decryption**:
   
   We created a Python script to safely decrypt the payload without executing it:

   ```
   import base64
   from cryptography.fernet import Fernet

   # Payload and key from the script
   payload = b'gAAAAABkzWGO_8MlYpNM0n0o718LL-w9m3rzXvCMRFghMRl6CSZwRD5DJOvN_jc8TFHmHmfiI8HWSu49MyoYKvb5mOGm_Jn4kkhC5fuRiGgmwEpxjh0z72dpi6TaPO2TorksAd2bNLemfTaYPf9qiTn_z9mvCQYV9cFKK9m1SqCSr4qDwHXgkQpm7IJAmtEJqyVUfteFLszyxv5-KXJin5BWf9aDPIskp4AztjsBH1_q9e5FIwIq48H7AaHmR8bdvjcW_ZrvhAIOInm1oM-8DjamKvhh7u3-lA=='
   key_str = 'correctstaplecorrectstaplecorrec'

   # Encode the key in Base64 as required by Fernet
   key_base64 = base64.b64encode(key_str.encode())

   # Create the Fernet object and decrypt the payload
   f = Fernet(key_base64)
   decrypted_payload = f.decrypt(payload)

   # Print the decrypted payload
   print(decrypted_payload.decode())
   ```

3. **Output**:

   Running the above script produced the following decrypted payload:

   ```
   pw = input('What\'s the password? ')

   if pw == 'batteryhorse':
       print('picoCTF{175_chr157m45_5274ff21}')
   else:
       print('That password is incorrect.')
   ```

4. **Retrieve the Flag**:

   From the decrypted payload, we see that the password is `batteryhorse`. When entered, it outputs the flag:

   ```
   picoCTF{175_chr157m45_5274ff21}
   ```

---

## Flag:

```
picoCTF{175_chr157m45_5274ff21}
```
