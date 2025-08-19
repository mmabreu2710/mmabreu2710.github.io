# Challenge "Wireshark doo dooo do doo..." Writeup

## Vulnerability: Plaintext Communication Captured in Network Traffic

### Where: Flag hidden in network traffic, encrypted with ROT13

### Impact: This challenge demonstrates how network traffic analysis can uncover sensitive information, such as flags or credentials, that may be sent over the network in an insecure or easily decipherable format.

**NOTE**: The challenge involves analyzing a `.pcap` file using Wireshark to extract and decode a hidden flag.

## Steps to reproduce:

1. **Open the `.pcap` File in Wireshark**:
   - We received a `.pcap` file, which we opened in Wireshark to analyze the captured network traffic.

2. **Analyze the TCP Streams**:
   - Using Wireshark's "Follow TCP Stream" feature, we examined each TCP stream to identify any meaningful data.
   - In `tcp.stream eq 5`, we found a suspicious string on the last line:

     ```
     cvpbPGS{c33xno00_1_f33_h_qrnqorrs}
     ```

3. **Decode the ROT13 Encrypted String**:
   - Recognizing the pattern, we suspected it was encoded with ROT13, a common substitution cipher that shifts each letter by 13 positions.
   - Decoding `cvpbPGS{c33xno00_1_f33_h_qrnqorrs}` with ROT13, we obtained:

     ```
     picoCTF{p33kab00_1_s33_u_deadbeef}
     ```

4. **Flag**:
   - The decoded flag was:

     ```
     picoCTF{p33kab00_1_s33_u_deadbeef}
     ```

## Conclusion:

By analyzing network traffic and identifying ROT13 encoding, we were able to decode the hidden flag within the `.pcap` file. This challenge highlights the importance of encryption in network communications to protect sensitive data.
