# Challenge "Enhance" Writeup

## Vulnerability: Hidden Text in SVG File

### Where: Flag hidden in tiny, nearly invisible text within an SVG file

### Impact: This challenge demonstrates how SVG files can be used to hide information through extremely small font sizes. By examining the SVG structure, hidden messages or flags can be revealed.

**NOTE**: The challenge involves extracting hidden text from an SVG file.

## Steps to reproduce:

1. **Inspect the SVG File**:
   - We were provided with an SVG file. Opening it normally did not reveal any visible text.
   - To inspect the file further, we opened it in a text editor (e.g., VSCode) to view the SVG's XML structure.

2. **Locate Hidden Text**:
   - Within the XML structure, we found multiple `<tspan>` tags, each containing individual characters or small groups of characters.
   - The characters were set with an extremely small font size, making them invisible when viewing the SVG normally.
   
3. **Extract the Text**:
   - By reading each `<tspan>` element in sequence, we manually collected each character and assembled them to form the hidden message.
   - The combined characters revealed the flag:

     ```
     picoCTF{3nh4nc3d_aab729dd}
     ```

4. **Final Flag**:
   - The flag extracted from the SVG file was:

     ```
     picoCTF{3nh4nc3d_aab729dd}
     ```

## Conclusion:

By inspecting the SVG file in a text editor and piecing together the hidden characters, we successfully recovered the flag. This challenge highlights the potential for hiding information within SVG files using tiny or obscured text elements.
