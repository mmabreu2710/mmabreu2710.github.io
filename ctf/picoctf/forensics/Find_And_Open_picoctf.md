# Challenge "Find and Open" Writeup

## Vulnerability: Sensitive Data Exposure in Network Traffic

### Where: Base64-encoded password found in packet capture file

### Impact: This challenge demonstrates how sensitive information, such as passwords, can be found in network traffic. By analyzing the packet data, we extracted a password, used it to unlock a zip file, and retrieved the flag.

**NOTE**: The challenge involves inspecting a packet capture file (`pcap`) to find an encoded password, decoding it, and using it to unlock a password-protected zip file.

## Steps to reproduce:

1. **Analyze the Packet Capture File**:
   - We received a `.pcap` file as part of the challenge.
   - Opening the file in Wireshark, we examined each packet for any suspicious or interesting data.

2. **Locate the Encoded Password**:
   - In packet #48, we found the following Base64-encoded string in the data field:

     ```
     VGhpcyBpcyB0aGUgc2VjcmV0OiBwaWNvQ1RGe1IzNERJTkdfTE9LZF8=
     ```

3. **Decode the Password**:
   - Decoding the Base64 string revealed the following text:

     ```
     picoCTF{R34DING_LOKd_
     ```

   - This looked like the beginning of the flag, but it was incomplete. However, it also served as the password for the password-protected zip file.

4. **Unlock the Zip File**:
   - Using the decoded text `picoCTF{R34DING_LOKd_` as the password, we unlocked the provided zip file.
   - Inside, we found a `flag.txt` file.

5. **Retrieve the Complete Flag**:
   - Opening `flag.txt`, we found the full flag:

     ```
     picoCTF{R34DING_LOKd_fil56_succ3ss_494c4f32}
     ```

## Conclusion:

By analyzing the packet capture file and extracting the Base64-encoded password, we unlocked the zip file and retrieved the flag. This challenge highlights the importance of monitoring network traffic, as sensitive information can sometimes be transmitted insecurely.
