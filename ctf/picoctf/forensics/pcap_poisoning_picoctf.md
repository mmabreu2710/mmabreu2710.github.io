# Challenge Writeup: pcap poisoning

## Challenge Description
We were given a `pcap` (packet capture) file and tasked with analyzing it to find a hidden flag. Packet captures are often used in network forensics, and flags can be hidden within the packet data or metadata.

## Steps to Solve the Challenge

### Step 1: Open the pcap File in Wireshark

We began by opening the `pcap` file in **Wireshark**, a network protocol analyzer tool. Wireshark is ideal for inspecting packet-level data and searching for specific patterns or keywords.

### Step 2: Search for the Flag String in Packet Bytes

1. In Wireshark, we navigated to **Edit > Find Packet** or pressed `Ctrl+F` to open the search dialog.
2. We selected **Packet bytes** as the search type and entered `pico` as the search term, as flags in PicoCTF typically start with this prefix.
3. This search revealed a flag embedded within the packet data.

   **Flag Found**:
   ```
   picoCTF{P64P_4N4L7S1S_SU55355FUL_f621fa37}
   ```

### Conclusion

The complete flag for this challenge is:
   ```
   picoCTF{P64P_4N4L7S1S_SU55355FUL_f621fa37}
   ```

This challenge demonstrated the use of packet analysis tools like Wireshark to extract hidden data from network traffic.
