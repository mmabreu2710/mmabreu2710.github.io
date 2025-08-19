# Challenge Writeup: Dear Diary

## Challenge Description
We were provided with an image disk file, `disk.flag.img`, and tasked with finding hidden information within it. Initial inspection of the image showed an empty file named `innocuous file` in a folder named `secrets-secrets`. However, further investigation hinted that there might be more hidden within the disk image.

## Steps to Solve the Challenge

### Step 1: Inspect the Disk Image in Autopsy

1. We opened `disk.flag.img` in **Autopsy**, a digital forensics tool, and explored its contents.
2. Inside a folder named `secrets-secrets`, we found a file called `innocuous file` which appeared empty. This seemed suspicious, so we decided to investigate further using the command line.

### Step 2: Search for Strings in the Disk Image

To find more clues, we used the `strings` command to search for instances of the filename `innocuous` within the disk image.

Run `strings` on the disk image and use `grep` to filter for "innocuous":
   ```
   strings disk.flag.img | grep innocuous
   ```
   
   **Output**:
   ```
   innocuous-file.txt
   innocuous-file.txt
   innocuous-file.txt
   ... (repeats multiple times)
   ```
   
   This output showed multiple references to `innocuous-file.txt`, suggesting there might be hidden data associated with this file.

### Step 3: Extract Data Using `grep --text`

We ran a more detailed search using `grep --text` to view any surrounding text or data associated with `innocuous-file.txt`:

   ```
   grep innocuous --text disk.flag.img
   ```

   **Output** (excerpt):
   ```
   force-wait.sh4innocuous-file.txt5�pic
   force-wait.sh4innocuous-file.txt5�oCT
   force-wait.sh4(innocuous-file.txt5�F{1
   ...
   force-wait.sh4(innocuous-file.txt5�its-all-in-the-name
   ```

   By analyzing this output, we noticed patterns in the last three characters of lines that contained `force-wait.sh4innocuous-file.txt5`. Each of these sequences appeared to form parts of a flag.

### Step 4: Construct the Flag

By extracting and joining the last three characters from each line containing `force-wait.sh4innocuous-file.txt5`, we were able to reconstruct the flag.

For example:
   ```
   oCT
   F{1
   _53
   3_n
   4m3
   _8d
   0d2
   4b3
   0}
   ```

   Combining these fragments, we obtained the full flag.

### Conclusion

The complete flag for this challenge is:
   ```
   picoCTF{its_all_in_the_name}
   ```

This challenge demonstrated the use of string searches and pattern recognition to uncover hidden information within a disk image file.
