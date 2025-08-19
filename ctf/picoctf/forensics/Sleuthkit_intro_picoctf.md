# Challenge "Sleuthkit Intro" Writeup

## Tool: Sleuthkit (mmls)

### Where: Disk image analysis to find partition size

### Impact: This challenge demonstrates the use of Sleuthkit tools (specifically `mmls`) to analyze the partition layout of a disk image and retrieve specific information, such as partition size.

**NOTE**: The challenge involves examining a disk image using `mmls` to report the length of a specific partition.

## Steps to reproduce:

1. **Download and Decompress the Disk Image**:
   - We received a compressed disk image file with a `.gz` extension.
   - To decompress it, we used the `gunzip` command:

     ```
     gunzip disk.img.gz
     ```

   - This produced a file named `disk.img`.

2. **Analyze the Partition Layout**:
   - Using `mmls` (a command from the Sleuthkit suite), we checked the partition layout of `disk.img`:

     ```
     mmls disk.img
     ```

   - The output showed different partitions, including a Linux partition, with its length in sectors specified. The length was noted as `202752` sectors.

3. **Submit the Length**:
   - We connected to the challenge server using `nc` (Netcat) to submit the partition length:

     ```
     nc saturn.picoctf.net 53141
     ```

   - The server prompted for the length, and we provided `202752`.

4. **Retrieve the Flag**:
   - Upon submission, the server confirmed our answer and provided the flag:

     ```
     picoCTF{mm15_f7w!}
     ```

## Conclusion:

By analyzing the partition layout of the disk image with `mmls`, we successfully identified the size of the Linux partition in sectors, submitted it to the server, and retrieved the flag. This challenge highlights basic disk image analysis techniques.
