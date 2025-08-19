# Challenge "Sleuthkit Apprentice" Writeup

## Tool: Sleuthkit (Autopsy)

### Where: Disk image analysis to locate hidden files

### Impact: This challenge demonstrates basic forensic analysis on a disk image to uncover hidden files. Using tools like Autopsy allows us to explore files and directories on the disk, including those that may contain flags or other sensitive information.

**NOTE**: The challenge involves using Autopsy to examine a disk image and locate a specific file containing the flag.

## Steps to reproduce:

1. **Open the Disk Image in Autopsy**:
   - We received a `disk.img` file.
   - Using Autopsy, we created a new case and added `disk.img` as the data source to explore its contents.

2. **Navigate Through the File Structure**:
   - Once loaded, we navigated through the directory structure displayed in Autopsy.
   - In the volume labeled `vol4`, under the `/root/my folder/` path, we located a file named `flag.uni.txt`.

3. **Extract the Flag**:
   - Opening the `flag.uni.txt` file in Autopsy revealed the flag:

     ```
     picoCTF{by73_5urf3r_3497ae6b}
     ```

## Conclusion:

By using Autopsy to explore the disk image, we successfully located the `flag.uni.txt` file within the `/root/my folder/` directory in `vol4` and retrieved the flag. This challenge highlights the fundamentals of disk image forensics.
