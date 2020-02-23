unit colorpickerplugin;

interface

uses
  NppPlugin, Forms, Classes, SysUtils, Windows, Controls, Dialogs,
  SciSupport, AboutForms, NppForms;

type
  TColorPickerPlugin = class(TNppPlugin)
  public
    constructor Create;
    destructor Destroy; override;
    procedure FuncColorPick;
    procedure FuncAbout;
  end;

procedure _FuncColorPick; cdecl;
procedure _FuncAbout; cdecl;

implementation

{ TColorPickerPlugin }

uses Color001;

constructor TColorPickerPlugin.Create;
var
  sk: PShortcutKey;
  i: Integer;
begin
  inherited;
  ColorForm:= TColorForm.Create(self);
  Self.PluginName := 'Color Picker';
  SetLength(Self.FuncArray,0);
  SetLength(Self.FuncArray,Length(Self.FuncArray)+1);
  i:=High(Self.FuncArray);
  StrCopy(self.FuncArray[i].ItemName, 'Color Picker');
  self.FuncArray[i].Func := _FuncColorPick;
  New(self.FuncArray[i].ShortcutKey);
  sk := self.FuncArray[i].ShortcutKey;
  sk.IsCtrl := False;
  sk.IsAlt := False;
  sk.IsShift := False;
  sk.Key := #0;
  SetLength(Self.FuncArray,Length(Self.FuncArray)+1);
  i:=High(Self.FuncArray);
  StrCopy(self.FuncArray[i].ItemName, 'About...');
  self.FuncArray[i].Func := _FuncAbout;
  self.FuncArray[i].ShortcutKey := nil;
end;

destructor TColorPickerPlugin.Destroy;
begin
  ColorForm.Free;
  Inherited Destroy;
end;

procedure _FuncColorPick; cdecl;
begin
  TColorPickerPlugin(Npp).FuncColorPick;
end;

procedure _FuncAbout; cdecl;
begin
  TColorPickerPlugin(Npp).FuncAbout;
end;

procedure TColorPickerPlugin.FuncColorPick;
var
  mResult: TModalResult;
  ColorStr: String;
begin
  ColorStr:= 'nothing picked';
  mResult:= ColorForm.ShowModal;
  If mResult=mrOK then
  begin
    { this works. label1 is a hidden label that stores a string value }
  ColorStr:= ColorForm.Label1.Caption;
  SendMessage(self.NppData.ScintillaMainHandle, SCI_ADDTEXT, Length(ColorStr), LPARAM(PChar(ColorStr)));
  end;

end;

procedure TColorPickerPlugin.FuncAbout;
var
  a: TAboutForm;
begin
  a := TAboutForm.Create(self);
  try
    a.ShowModal;
  finally
    a.Free;
  end;
end;

initialization
  Npp := TColorPickerPlugin.Create;

end.
