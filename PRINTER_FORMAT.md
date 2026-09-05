# Format of PRINTER.TXT

The FAND report separates objects using structural markers composed of the `0x11` (Device Control 1) character, followed by a type character, the object name, and terminated by another `0x11` character.

## Format

```
<0x11> <Type> <Object Name> <0x11>
```

## Examples

```
 F  ParamCat    
 P  pPrijem     
 E  eParDat     
 M  mHelp       
```

Object content immediately follows the header until the next `0x11` marker.
Some types may lack names, e.g., `\x11 D \x11`.
