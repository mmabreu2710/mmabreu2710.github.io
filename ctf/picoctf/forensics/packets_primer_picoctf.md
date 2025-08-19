# Challenge "Packets Primer" Writeup

## Vulnerability: Information Leakage in Network Packets

### Where: Flag hidden within network packet data

### Impact: This challenge demonstrates how information can be hidden within network traffic and reveals how analyzing packets can uncover hidden messages.

**NOTE**: The challenge involves examining packet data to locate and extract a hidden flag.

## Steps to reproduce:

1. **Analyze the Provided PCAP File**:
   - We received a packet capture (`pcap`) file as part of the challenge.
   - Opening the file in Wireshark, we examined individual packets for any readable content or hidden messages.

2. **Locate the Flag**:
   - By inspecting the packet contents, we found one packet containing readable text with the flag.
   - The flag was embedded as clear text within the packet data, and it was visible in the hexadecimal or ASCII view of Wireshark.

3. **Flag**:
   - The extracted flag from the packet is:

     ```
     picoCTF{p4ck37_5h4rk_b9d53765}
     ```

## Conclusion:

By examining the packets in the provided `pcap` file, we located and extracted the hidden flag. This highlights the importance of inspecting network traffic carefully, as sensitive information can sometimes be unintentionally exposed.
