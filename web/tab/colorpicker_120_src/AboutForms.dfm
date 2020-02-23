inherited AboutForm: TAboutForm
  Left = 396
  Top = 225
  AutoSize = True
  Caption = 'About Color Picker'
  ClientHeight = 199
  ClientWidth = 227
  Color = 16645629
  Constraints.MinHeight = 225
  Constraints.MinWidth = 235
  Font.Charset = ANSI_CHARSET
  Font.Name = 'Tahoma'
  OldCreateOrder = True
  Position = poScreenCenter
  ExplicitWidth = 235
  ExplicitHeight = 225
  PixelsPerInch = 96
  TextHeight = 13
  object Button1: TButton
    Left = 142
    Top = 167
    Width = 75
    Height = 25
    Caption = 'OK'
    ModalResult = 1
    TabOrder = 0
  end
  object Panel1: TPanel
    Left = 0
    Top = 0
    Width = 217
    Height = 73
    BevelInner = bvRaised
    BevelOuter = bvLowered
    Color = 15724527
    TabOrder = 1
    object Label1: TLabel
      Left = 8
      Top = 8
      Width = 164
      Height = 13
      Caption = 'Color Picker Plugin for Notepad++'
    end
    object Label2: TLabel
      Left = 8
      Top = 27
      Width = 156
      Height = 13
      Caption = 'Version 1.2    Copyright (c) 2008'
    end
    object Label3: TLabel
      Left = 8
      Top = 46
      Width = 99
      Height = 13
      Caption = 'Author: Don Rowlett'
    end
  end
  object Panel2: TPanel
    Left = 0
    Top = 65
    Width = 217
    Height = 96
    BevelInner = bvRaised
    BevelOuter = bvLowered
    Color = 15724527
    TabOrder = 2
    object Label4: TLabel
      Left = 8
      Top = 8
      Width = 66
      Height = 13
      Caption = 'Credits go to:'
    end
    object Label5: TLabel
      Left = 8
      Top = 27
      Width = 168
      Height = 26
      Caption = 
        'Todd Hadley (Fidvo) for his help on'#13#10'getting Color Picker starte' +
        'd'
    end
    object Label6: TLabel
      Left = 8
      Top = 59
      Width = 192
      Height = 26
      Caption = 
        'Zarko Gajic and Andy Farrel for inspiring'#13#10'the color control in ' +
        'Color Picker'
    end
  end
end
