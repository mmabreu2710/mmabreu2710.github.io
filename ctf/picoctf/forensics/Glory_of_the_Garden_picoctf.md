# Challenge Writeup: Glory of the Garden

## Steps to Solve the Challenge

### Step 1: Search for Hidden Strings in the Image

We were given a JPEG file named `garden.jpg`. Since flags are sometimes hidden within image files as strings, we started by searching for any readable text inside the file.

1. Use the `strings` command to extract readable text from `garden.jpg` and pipe it to `grep` to look for "pico":
   ```
   strings garden.jpg | grep "pico"
   ```

   **Output**:
   ```
   Here is a flag "picoCTF{more_than_m33ts_the_3y3eBdBd2cc}"
   ```

This command revealed the flag hidden within the image file as a readable string.

### Conclusion

The complete flag for this challenge is:
   ```
   picoCTF{more_than_m33ts_the_3y3eBdBd2cc}
   ```

This challenge demonstrates how flags or important information can be hidden within files and easily retrieved by searching for common flag formats using `strings` and `grep`.
